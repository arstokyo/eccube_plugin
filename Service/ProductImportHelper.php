<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Eccube\Entity\BaseInfo;
use Eccube\Entity\Master\ProductStatus;
use Eccube\Entity\Master\SaleType;
use Eccube\Entity\Member;
use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;
use Eccube\Entity\ProductStock;
use Eccube\Entity\TaxRule;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Repository\Master\ProductStatusRepository;
use Eccube\Repository\Master\SaleTypeRepository;
use Eccube\Repository\ProductClassRepository;
use Eccube\Repository\TaxRuleRepository;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods\MasterModelInterface;
use Plugin\AceClient43\Bridge\ProductBridge;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\HelperImportProductEvent;
use Plugin\AceClient43\Events\HelperOnCreateProductEvent;
use Plugin\AceClient43\Events\HelperOnCreateProductFailedEvent;
use Plugin\AceClient43\Events\HelperOnSetPriceEvent;
use Plugin\AceClient43\Events\HelperPreImportProductEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductImportHelper
{
    private ProductBridge $productBridge;

    private LoggerInterface $logger;

    private ProductClassRepository $productClassRepository;

    private ProductStatusRepository $productStatusRepository;

    private ObjectManager $entityManager;

    private EventDispatcherInterface $eventDispatcher;

    private TaxRuleRepository $taxRuleRepository;

    private BaseInfo $baseInfo;

    private SaleTypeRepository $saleTypeRepository;

    private ManagerRegistry $managerRegistry;

    public function __construct(
        ProductBridge $productBridge,
        LoggerInterface $logger,
        ProductClassRepository $productClassRepository,
        ProductStatusRepository $productStatusRepository,
        TaxRuleRepository $taxRuleRepository,
        SaleTypeRepository $saleTypeRepository,
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        BaseInfoRepository $baseInfoRepository,
        ManagerRegistry $managerRegistry,
    ) {
        $this->productBridge = $productBridge;
        $this->logger = $logger;
        $this->productClassRepository = $productClassRepository;
        $this->productStatusRepository = $productStatusRepository;
        $this->saleTypeRepository = $saleTypeRepository;
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->taxRuleRepository = $taxRuleRepository;
        $this->baseInfo = $baseInfoRepository->get();
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * 商品をインポートする
     *
     * @param Member $creator 作成者
     * @param \DateTime $updateFrom 更新対象開始日
     * @param \DateTime $updateTo 更新対象終了日
     * @param array $options オプション
     * @param OutputInterface|null $output コンソール出力インターフェース
     *
     * @return int インポートされた商品数
     */
    public function import(Member &$creator, \DateTime $updateFrom, \DateTime $updateTo, array &$options = [], ?OutputInterface $output = null): int
    {
        $options = array_merge([
            '_trigger' => ProductImportHelper::class,
            '_failed_product_codes' => [],
            '_product_import_helper.import_stock' => false,
        ], $options);
        $master = $this->productBridge->getAll($updateFrom, $updateTo, $options);

        if (null === $master || count($master->getGoods()) === 0 || count($master->getGtanka()) === 0) {
            $this->log('error', '商品または単価がありませんため、インポート処理を中止します。', $output);

            return 0;
        }

        if ($this->eventDispatcher->hasListeners(Events::HELPER_PRE_IMPORT_PRODUCT)) {
            $event = new HelperPreImportProductEvent($master, $updateFrom, $updateTo, $creator, $output, $options);
            $this->eventDispatcher->dispatch($event, Events::HELPER_PRE_IMPORT_PRODUCT);

            if (!$event->continue) {
                $this->log('info', '商品インポート処理が中止されました。', $output);

                return $event->importCount;
            }

            $options = $event->options;
        }

        $createdProducts = $this->create($master, $creator, $output, $options);

        if ($this->eventDispatcher->hasListeners(Events::HELPER_POST_IMPORT_PRODUCT)) {
            $this->eventDispatcher->dispatch(
                new HelperImportProductEvent($createdProducts, $master, $output, $options),
                Events::HELPER_POST_IMPORT_PRODUCT
            );
        }

        if (count($createdProducts) === 0) {
            $this->log('error', '商品が作成されませんでした。', $output);

            return 0;
        }

        return count($createdProducts);
    }

    /**
     * 商品を作成する
     *
     * @param MasterModelInterface $master 商品マスターデータ
     * @param Member $creator 作成者
     * @param OutputInterface|null $output コンソール出力インターフェース
     * @param array $options オプション
     *
     * @return <string, ProductClass>[] 作成された商品モデルの配列
     */
    private function create(MasterModelInterface $master, Member &$creator, ?OutputInterface $output, array &$options = []): array
    {
        $settingBag = $this->createSettingBag($master);
        $productModels = $master->getGoods();
        $processedProductClasses = [];

        foreach ($productModels as $productModel) {
            try {
                // エンティティマネージャーの状態をリセット
                $entityManager = $this->entityManager;
                $entityManager = EntityManagerResetHelper::resetIfNotOpen($entityManager, $this->managerRegistry, $output);

                /** @var ProductClass $productClass */
                /** @var ProductStock $productStock */
                /** @var Product $product */
                [$aceProductId, $productClass, $product, $productStock] = $this->getOrCreateProductStuff($productModel, $creator, $output);

                $product->setName($productModel->getGname());
                $productClass->setAceProductId($aceProductId);
                $productClass->setStockUnlimited(false);
                $productClass->setAceProductType($productModel->getGkbn());
                $productClass->setSaleType($settingBag['normal_sale_type']);

                $this->setStatus($productModel, $product, $productClass, $settingBag);
                $this->setPrice($productModel, $productClass, $creator, $settingBag, $options, $output);

                // import_stockがtrueの場合のみ在庫を更新する
                if ($options['_product_import_helper.import_stock']) {
                    $stock = $productModel->getZaiko();
                    $productStock->setStock($stock);
                    $productClass->setStock($stock);
                }

                if ($settingBag['has_on_create_product_subscribed']) {
                    /** @var HelperOnCreateProductEvent $onCreateEvent */
                    $onCreateEvent = $settingBag['on_create_product_event'];
                    if (null === $onCreateEvent) {
                        $onCreateEvent = new HelperOnCreateProductEvent($productClass, $productStock, $productModel, $productModels, $processedProductClasses, $creator, $output, $options);
                        $settingBag['on_create_product_event'] = $onCreateEvent;
                    } else {
                        $onCreateEvent->productClass = $productClass;
                        $onCreateEvent->productStock = $productStock;
                        $onCreateEvent->productModel = $productModel;
                        $onCreateEvent->processedProductsClasses = $processedProductClasses;
                        $onCreateEvent->options = $options;
                        $onCreateEvent->failed = false;
                    }

                    $this->eventDispatcher->dispatch($onCreateEvent, Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT);
                    if ($onCreateEvent->failed) {
                        $this->log('error', '商品の作成に失敗しました: '.$aceProductId, $output);
                        $options['_failed_product_codes'][] = $aceProductId;

                        if ($onCreateEvent->shouldBreak) {
                            $this->log('info', '商品の作成が中止されました。', $output);
                            break;
                        }

                        continue;
                    }

                    if ($onCreateEvent->shouldBreak) {
                        $this->log('info', '商品の作成が中止されました。', $output);
                        break;
                    }

                    $options = $onCreateEvent->options;
                }

                $entityManager->persist($product);
                $entityManager->persist($productClass);
                $entityManager->persist($productStock);

                $entityManager->flush();

                $processedProductClasses[$aceProductId] = $productClass;
            } catch (\Throwable $e) {
                $this->log('error', '商品作成中にエラーが発生しました: '.$e->getMessage(), $output);
                // エラーが発生した場合は、キャッシュされたエンティティマネージャーをリセット
                $this->handleCreateProductFailed($productModel, $processedProductClasses, $options, $output, $settingBag, $creator);
            }
        }

        return $processedProductClasses;
    }

    /**
     * 単価を設定する
     *
     * @param GoodModelGroup1Interface $productModel 商品モデル
     * @param ProductClass $productClass 商品クラス
     * @param Member $creator 作成者
     * @param array $settingBag 設定情報の配列
     * @param array $options オプション
     * @param OutputInterface|null $output
     *
     * @return void
     */
    private function setPrice(GoodModelGroup1Interface $productModel, ProductClass $productClass, Member $creator, array &$settingBag, array &$options, ?OutputInterface $output): void
    {
        $groupedTankaModels = $settingBag['grouped_tanka_models'];
        /** @var GoodTankaModelGroup1Interface[] $tankaModels */
        $tankaModels = $groupedTankaModels[$productClass->getAceProductId()] ?? [];

        if (empty($tankaModels)) {
            $this->log('error', '単価が設定されていません: '.$productModel->getGdid(), $output);

            return;
        }

        $sortFunction = $settingBag['sort_function'];
        $onSetPriceEvent = $settingBag['on_set_price_event'];

        usort($tankaModels, $sortFunction);
        $tankaModel = $tankaModels[0];

        $productClass->setTaxRate($tankaModel->getTaxRate());
        // 税抜きの金額を設定
        // 税金と税込みは勝手に計算されるため、see@TaxRuleEventSubscriber::prePersist
        $productClass->setPrice01($tankaModel->getRevtanka());
        $productClass->setPrice02($tankaModel->getRevtanka());

        $taxRule = $this->getOrCreateTaxRule($productClass, $creator);
        $taxRule->setTaxRate($tankaModel->getTaxrate());
        $taxRule->setApplyDate($tankaModel->getDay()->toDateTime());
        $taxRule->setProduct($productClass->getProduct());

        if (!$settingBag['has_on_set_price_subscribed']) {
            return;
        }

        if (null === $onSetPriceEvent) {
            $onSetPriceEvent = new HelperOnSetPriceEvent(
                $productClass,
                $creator,
                $groupedTankaModels,
                $tankaModels,
                $tankaModel,
                $settingBag,
                $options,
                $output
            );
            $settingBag['on_set_price_event'] = $onSetPriceEvent;
        } else {
            $onSetPriceEvent->productClass = $productClass;
            $onSetPriceEvent->firstTankaModel = $tankaModel;
            $onSetPriceEvent->currentModels = $tankaModels;
            $onSetPriceEvent->groupedTankaModels = $groupedTankaModels;
            $onSetPriceEvent->options = $options;
        }

        $this->eventDispatcher->dispatch($onSetPriceEvent, Events::PRODUCT_IMPORT_HELPER_ON_SET_PRICE);
        $options = $onSetPriceEvent->options;
    }

    /**
     * ログを出力する
     *
     * @param string $level ログレベル
     * @param string $message ログメッセージ
     * @param OutputInterface|null $output コンソール出力インターフェース
     */
    private function log(string $level, string $message, ?OutputInterface $output = null): void
    {
        if ($output) {
            $output->writeln(sprintf('<%s>[Product_Import_Helper] %s</%s>', $level, $message, $level));
        }

        $method = strtolower($level);
        if (method_exists($this->logger, $method)) {
            $this->logger->$method($message);
        } else {
            $this->logger->info($message);
        }
    }

    /**
     * 商品の情報を取得または作成する
     *
     * @param GoodModelGroup1Interface $productModel 商品モデル
     * @param Member $creator 作成者
     * @param OutputInterface $output コンソール出力インターフェース
     *
     * @return array 商品ID、商品クラス、商品、商品在庫の配列
     */
    private function getOrCreateProductStuff(GoodModelGroup1Interface $productModel, Member $creator, OutputInterface $output): array
    {
        $aceProductId = $productModel->getGdid();
        $productClass = $this->productClassRepository->findOneBy(['ace_product_id' => $aceProductId]);
        $productStock = $productClass ? $productClass->getProductStock() : null;
        $product = $productClass ? $productClass->getProduct() : null;

        if (null === $productClass) {
            // todo: instead of print out the message, we should log out it.
            // $this->log('info', sprintf('商品を作成しています: %s (%s)', $productModel->getGname(), $aceProductId), $output);

            $product = new Product();
            $productClass = new ProductClass();
            $productStock = new ProductStock();

            $product->addProductClass($productClass);
            $product->setCreator($creator);

            $productClass->setCreator($creator);
            $productClass->setProduct($product);
            $productClass->setProductStock($productStock);
            $productClass->setCode($aceProductId);

            $productStock->setProductClass($productClass);
            $productStock->setCreator($creator);
        } else {
            // todo: instead of print out the message, we should log out it.
            // $output->writeln('<info>[ProductImportHelper] 商品を更新しています: '.$aceProductId.' (ID: '.$productModel->getGdid().')</info>');
        }

        return [$aceProductId, $productClass, $product, $productStock];
    }

    /**
     * 商品クラスに紐づく税率ルールを取得または作成する
     *
     * @param ProductClass $productClass 商品クラス
     * @param Member $creator 作成者
     *
     * @return TaxRule 税率ルール
     */
    private function getOrCreateTaxRule(ProductClass $productClass, Member $creator): TaxRule
    {
        if ($productClass->getTaxRule()) {
            return $productClass->getTaxRule();
        }

        $taxRule = $this->taxRuleRepository->newTaxRule();
        $taxRule->setProductClass($productClass);
        $taxRule->setCountry(null);
        $taxRule->setProduct($productClass->getProduct());
        $taxRule->setCreator($creator);
        $productClass->setTaxRule($taxRule);

        return $taxRule;
    }

    /**
     * オプション商品税率ルールを有効にする
     *
     * @return void
     */
    private function enableOptionProductTaxRule(): void
    {
        $baseInfo = $this->baseInfo;
        if ($baseInfo->isOptionProductTaxRule()) {
            return;
        }

        $baseInfo->setOptionProductTaxRule(true);
        $this->entityManager->persist($baseInfo);
        $this->entityManager->flush($baseInfo);
    }

    private function createSettingBag(MasterModelInterface $master): array
    {
        $tankaModels = $master->getGtanka();

        // このあと、設定されたTaxRuleを採用するため、オプション商品税率ルールを有効にする。
        $this->enableOptionProductTaxRule();
        $groupedTankaModels = [];
        $sortFunction = function ($a, $b) {
            return $a->getTankakbn() <=> $b->getTankakbn();
        };

        // 商品IDごとにグループ化
        foreach ($tankaModels as $tankaModel) {
            $aceProductId = $tankaModel->getGdid();
            $groupedTankaModels[$aceProductId][] = $tankaModel;
        }

        $displayShowStatus = $this->productStatusRepository->find(ProductStatus::DISPLAY_SHOW);
        $displayAbolishedStatus = $this->productStatusRepository->find(ProductStatus::DISPLAY_ABOLISHED);
        $displayHideStatus = $this->productStatusRepository->find(ProductStatus::DISPLAY_HIDE);
        $normalSaleType = $this->saleTypeRepository->find(SaleType::SALE_TYPE_NORMAL);

        $hasOnCreateProductSubscribed = $this->eventDispatcher->hasListeners(Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT);
        $hasOnSetPriceSubscribed = $this->eventDispatcher->hasListeners(Events::PRODUCT_IMPORT_HELPER_ON_SET_PRICE);
        $hasOnCreateProductFailedSubscribed = $this->eventDispatcher->hasListeners(Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED);

        return [
            'grouped_tanka_models' => $groupedTankaModels,
            'sort_function' => $sortFunction,
            'display_show_status' => $displayShowStatus,
            'display_abolished_status' => $displayAbolishedStatus,
            'display_hide_status' => $displayHideStatus,
            'normal_sale_type' => $normalSaleType,
            'has_on_create_product_subscribed' => $hasOnCreateProductSubscribed,
            'has_on_set_price_subscribed' => $hasOnSetPriceSubscribed,
            'has_on_create_product_failed_subscribed' => $hasOnCreateProductFailedSubscribed,
            'on_create_product_event' => null,
            'on_set_price_event' => null,
            'on_create_product_failed_event' => null,
        ];
    }

    /**
     * 商品のステータスを設定する
     *
     * @param GoodModelGroup1Interface $productModel 商品モデル
     * @param Product $product 商品エンティティ
     * @param ProductClass $productClass 商品クラスエンティティ
     * @param array $settingBag 設定情報の配列
     *
     * @return void
     */
    private function setStatus(
        GoodModelGroup1Interface $productModel,
        Product $product,
        ProductClass $productClass,
        array $settingBag,
    ): void {
        $displayAbolishedStatus = $settingBag['display_abolished_status'];

        if ($productModel->isSoftDelete()) {
            $product->setStatus($displayAbolishedStatus);
            $productClass->setVisible(false);

            return;
        }

        $productClass->setVisible(true);
        $status = $settingBag['display_show_status'];
        $displayHideStatus = $settingBag['display_hide_status'];

        // 商品の状態に応じてステータスを設定
        switch ($productModel->getTkbn()) {
            case 10:
                $status = $displayHideStatus;
                $productClass->setVisible(false);
                break;
            case 99:
                $status = $displayAbolishedStatus;
                $productClass->setVisible(false);
                break;
        }

        $product->setStatus($status);
    }

    /**
     * 設定情報の配列をリセットする
     *
     * @param array $settingBag 設定情報の配列
     *
     * @return array リセットされた設定情報の配列
     */
    private function resetSettingBagEntity(array $settingBag): array
    {
        $displayHideStatus = $this->entityManager->find(ProductStatus::class, ProductStatus::DISPLAY_HIDE);
        $displayAbolishedStatus = $this->entityManager->find(ProductStatus::class, ProductStatus::DISPLAY_ABOLISHED);
        $displayShowStatus = $this->entityManager->find(ProductStatus::class, ProductStatus::DISPLAY_SHOW);
        $normalSaleType = $this->entityManager->find(SaleType::class, SaleType::SALE_TYPE_NORMAL);

        return array_merge(
            $settingBag, [
                'display_show_status' => $displayShowStatus,
                'display_abolished_status' => $displayAbolishedStatus,
                'display_hide_status' => $displayHideStatus,
                'normal_sale_type' => $normalSaleType,
            ]
        );
    }

    /**
     * 商品作成失敗時の処理を行う
     *
     * @param GoodModelGroup1Interface $productModel 商品モデル
     * @param array $processedProductClasses 処理済み商品クラス配列
     * @param array $options オプション
     * @param OutputInterface|null $output コンソール出力インターフェース
     * @param array $settingBag 設定情報の配列
     * @param Member $creator 作成者
     *
     * @return void
     */
    private function handleCreateProductFailed(GoodModelGroup1Interface $productModel, array $processedProductClasses, array &$options, ?OutputInterface $output, array &$settingBag, Member &$creator): void
    {
        $options['_failed_product_codes'][] = $productModel->getGdid();
        $this->entityManager = EntityManagerResetHelper::resetEntityManager($this->entityManager, $this->managerRegistry, $output);
        $settingBag = $this->resetSettingBagEntity($settingBag);
        $creator = $this->entityManager->getRepository(Member::class)->find($creator->getId());
        $this->taxRuleRepository->clearCache();

        if (!$settingBag['has_on_create_product_failed_subscribed']) {
            return;
        }

        /** @var HelperOnCreateProductFailedEvent $onCreateProductFailedEvent */
        $onCreateProductFailedEvent = $settingBag['on_create_product_failed_event'];
        if (null === $onCreateProductFailedEvent) {
            $onCreateProductFailedEvent = new HelperOnCreateProductFailedEvent(
                $processedProductClasses,
                $options,
                $this->entityManager,
                $output,
            );
            $settingBag['on_create_product_failed_event'] = $onCreateProductFailedEvent;
        } else {
            $onCreateProductFailedEvent->options = $options;
            $onCreateProductFailedEvent->entityManager = $this->entityManager;
            $onCreateProductFailedEvent->output = $output;
        }

        $this->eventDispatcher->dispatch($onCreateProductFailedEvent, Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED);
        $options = $onCreateProductFailedEvent->options;
    }
}
