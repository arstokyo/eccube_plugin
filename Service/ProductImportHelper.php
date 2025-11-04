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
use Plugin\AceClient43\Bridge\ProductBridge;
use Plugin\AceClient43\Entity\Constants\AceProductOrderStatus;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\HelperImportProductEvent;
use Plugin\AceClient43\Events\HelperOnCreateProductEvent;
use Plugin\AceClient43\Events\HelperOnCreateProductFailedEvent;
use Plugin\AceClient43\Events\HelperOnSetPriceEvent;
use Plugin\AceClient43\Events\HelperPreImportProductEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductImportHelper
{
    public const TRIGGER_IMPORT_WITH_GET_GOODS = 'product_import_helper.import_with_get_goods';

    public const TRIGGER_IMPORT_WITH_GET_ITEMS = 'product_import_helper.import_with_get_items';

    public array $defaultSetting = [
        '_failed_product_codes' => [],
        '_product_import_helper.import_stock' => true,
        '_product_import_helper.set_product_status' => true,
        '_product_import_helper.set_price' => true,
        '_product_import_helper.create_new' => true,
        '_product_import_helper.hide_on_new' => false,
    ];

    protected ProductBridge $productBridge;

    protected LoggerInterface $logger;

    protected ProductClassRepository $productClassRepository;

    protected ProductStatusRepository $productStatusRepository;

    protected ObjectManager $entityManager;

    protected EventDispatcherInterface $eventDispatcher;

    protected TaxRuleRepository $taxRuleRepository;

    protected BaseInfo $baseInfo;

    protected SaleTypeRepository $saleTypeRepository;

    protected ManagerRegistry $managerRegistry;

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
     * @param LoggerInterface|null $logger コンソール出力インターフェース
     *
     * @return int インポートされた商品数
     */
    public function import(Member &$creator, \DateTime $updateFrom, \DateTime $updateTo, array &$options = [], ?LoggerInterface $logger = null): int
    {
        if ($logger === null) {
            $logger = $this->logger;
        }

        $options = array_merge(
            array_merge($this->defaultSetting, ['_trigger' => self::TRIGGER_IMPORT_WITH_GET_GOODS]),
            $options
        );

        if ($this->eventDispatcher->hasListeners(Events::HELPER_PRE_IMPORT_PRODUCT)) {
            $request = [
                'update_from' => $updateFrom,
                'update_to' => $updateTo,
            ];

            $event = new HelperPreImportProductEvent($request, $logger, $options);
            $this->eventDispatcher->dispatch($event, Events::HELPER_PRE_IMPORT_PRODUCT);

            $updateFrom = $event->request['update_from'];
            $updateTo = $event->request['update_to'];
            $options = $event->options;
        }

        $master = $this->productBridge->getAll($updateFrom, $updateTo, $options);

        if (null === $master || !$master->hasGoods() || !$master->hasGtanka()) {
            $logger->warning('<warning>商品または単価がありませんため、インポート処理を中止します。</warning>');

            return 0;
        }

        $productModels = $master->getGoods();
        $tankaModels = $master->getGtanka();

        $createdProducts = $this->create($productModels, $tankaModels, $creator, $logger, $options);

        if ($this->eventDispatcher->hasListeners(Events::HELPER_POST_IMPORT_PRODUCT)) {
            $this->eventDispatcher->dispatch(
                new HelperImportProductEvent($createdProducts, $productModels, $tankaModels, $logger, $options),
                Events::HELPER_POST_IMPORT_PRODUCT
            );
        }

        if (count($createdProducts) === 0) {
            $logger->error('<error>商品が作成されませんでした。</error>');

            return 0;
        }

        return count($createdProducts);
    }

    /**
     * 商品IDによる商品インポート
     *
     * @param Member $creator 作成者
     * @param array $productIds 商品ID配列
     * @param array $options オプション
     * @param LoggerInterface|null $logger コンソール出力インターフェース
     *
     * @return int インポートされた商品数
     */
    public function importByAceProductIds(Member &$creator, array $productIds, array &$options = [], ?LoggerInterface $logger = null): int
    {
        if ($logger === null) {
            $logger = $this->logger;
        }

        if (empty($productIds)) {
            $logger->error('<error>商品IDが指定されていないため、インポート処理を中止します。</error>');

            return 0;
        }

        $options = array_merge(
            array_merge($this->defaultSetting, [
                '_trigger' => self::TRIGGER_IMPORT_WITH_GET_ITEMS,
                '_get_items.skid' => null,
                '_get_items.free_kubuns' => [],
            ]),
            $options
        );

        if ($this->eventDispatcher->hasListeners(Events::HELPER_PRE_IMPORT_PRODUCT)) {
            $request['product_ids'] = $productIds;

            $event = new HelperPreImportProductEvent($request, $logger, $options);
            $this->eventDispatcher->dispatch($event, Events::HELPER_PRE_IMPORT_PRODUCT);

            $productIds = $event->request['product_ids'];
            $options = $event->options;
        }

        $payload = $this->productBridge->getItems($productIds, $options['_get_items.free_kubuns'], $options['_get_items.skid'], $options);
        $createdProducts = $this->create($payload->getItems(), [], $creator, $logger, $options);

        if ($this->eventDispatcher->hasListeners(Events::HELPER_POST_IMPORT_PRODUCT)) {
            $this->eventDispatcher->dispatch(
                new HelperImportProductEvent($createdProducts, $payload->getItems(), [], $logger, $options),
                Events::HELPER_POST_IMPORT_PRODUCT
            );
        }

        if (count($createdProducts) === 0) {
            $logger->error('<error>商品が作成されませんでした。</error>');

            return 0;
        }

        return count($createdProducts);
    }

    /**
     * 商品を作成する
     *
     * @param GoodModelGroup1Interface[] $productModels 商品モデル
     * @param GoodTankaModelGroup1Interface[] $tankaModels 単価モデル
     * @param Member $creator 作成者
     * @param LoggerInterface $logger
     * @param array $options オプション
     *
     * @return <string, ProductClass>[] 作成された商品モデルの配列
     */
    protected function create(array $productModels, array $tankaModels, Member &$creator, LoggerInterface $logger, array &$options = []): array
    {
        $settingBag = $this->createSettingBag($tankaModels);
        $processedProductClasses = [];

        foreach ($productModels as $productModel) {
            try {
                // エンティティマネージャーの状態をリセット
                $entityManager = $this->entityManager;
                $entityManager = EntityManagerResetHelper::resetIfNotOpen($entityManager, $this->managerRegistry, $logger);

                $productClass = $this->productClassRepository->findOneBy(['ace_product_id' => $productModel->getGdid()]);
                $isNew = null === $productClass;
                if ($isNew && !$options['_product_import_helper.create_new']) {
                    continue;
                }

                /** @var ProductClass $productClass */
                /** @var ProductStock $productStock */
                /** @var Product $product */
                [$aceProductId, $productClass, $product, $productStock] = $this->getOrCreateProductStuff($productModel, $creator, $productClass);

                $tankaModels = method_exists($productModel, 'getTanka')
                    ? $productModel->getTanka()
                    : ($settingBag['grouped_tanka_models'][$aceProductId] ?? []);

                if (empty($tankaModels)) {
                    $logger->error(sprintf('<error>単価が設定されていません:%s</error>', $productModel->getGdid()));

                    continue;
                }

                $product->setName($productModel->getGname());
                $productClass->setAceProductId($aceProductId);
                $productClass->setStockUnlimited(false);
                $productClass->setAceProductType($productModel->getGkbn());
                $productClass->setSaleType($settingBag['normal_sale_type']);

                if ($isNew && $options['_product_import_helper.hide_on_new']) {
                    $product->setStatus($settingBag['display_hide_status']);
                } elseif ($options['_product_import_helper.set_product_status']) {
                    $this->setStatus($productModel, $product, $productClass, $settingBag);
                }

                if ($options['_product_import_helper.set_price']) {
                    $this->setPrice($productModel, $productClass, $creator, $tankaModels, $settingBag, $options, $logger);
                }

                // import_stockがtrueの場合のみ在庫を更新する
                if ($options['_product_import_helper.import_stock']) {
                    $stock = $productModel->getZaiko() ? max($productModel->getZaiko(), 0) : 0;
                    $productStock->setStock($stock);
                    $productClass->setStock($stock);
                }

                if ($settingBag['has_on_create_product_subscribed']) {
                    /** @var HelperOnCreateProductEvent $onCreateEvent */
                    $onCreateEvent = $settingBag['on_create_product_event'];
                    if (null === $onCreateEvent) {
                        $onCreateEvent = new HelperOnCreateProductEvent($productClass, $productStock, $productModel, $productModels, $processedProductClasses, $creator, $logger, $options, $settingBag);
                        $settingBag['on_create_product_event'] = $onCreateEvent;
                    } else {
                        $onCreateEvent->productClass = $productClass;
                        $onCreateEvent->productStock = $productStock;
                        $onCreateEvent->productModel = $productModel;
                        $onCreateEvent->processedProductsClasses = $processedProductClasses;
                        $onCreateEvent->options = $options;
                        $onCreateEvent->settingBag = $settingBag;
                        $onCreateEvent->failed = false;
                    }

                    $this->eventDispatcher->dispatch($onCreateEvent, Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT);
                    if ($onCreateEvent->failed) {
                        $logger->error(sprintf('<error>商品の作成に失敗しました:%s</error>', $aceProductId));
                        $options['_failed_product_codes'][] = $aceProductId;

                        if ($onCreateEvent->shouldBreak) {
                            $logger->warning('<warning>商品の作成が中止されました。</warning>');

                            break;
                        }

                        continue;
                    }

                    if ($onCreateEvent->shouldBreak) {
                        $logger->warning('<warning>商品の作成が中止されました。</warning>');

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
                $logger->error(sprintf('<error>商品作成中にエラーが発生しました:%s</error>', $e->getMessage()));

                // エラーが発生した場合は、キャッシュされたエンティティマネージャーをリセット
                $this->handleCreateProductFailed($productModel, $processedProductClasses, $options, $logger, $settingBag, $creator);
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
     * @param GoodTankaModelGroup1Interface[] $tankaModels 単価モデル
     * @param array $settingBag 設定情報の配列
     * @param array $options オプション
     * @param LoggerInterface $logger
     *
     * @return void
     */
    protected function setPrice(GoodModelGroup1Interface $productModel, ProductClass $productClass, Member $creator, array $tankaModels, array &$settingBag, array &$options, LoggerInterface $logger): void
    {
        $groupedTankaModels = $settingBag['grouped_tanka_models'];

        if (empty($tankaModels)) {
            $logger->error(sprintf('<error>単価が設定されていません:%s</error>', $productModel->getGdid()));

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
        $productClass->setAceTaxType($tankaModel->getTaxkbn());

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
                $logger
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
     * 商品の情報を取得または作成する
     *
     * @param GoodModelGroup1Interface $productModel 商品モデル
     * @param Member $creator 作成者
     *
     * @return array 商品ID、商品クラス、商品、商品在庫の配列
     */
    protected function getOrCreateProductStuff(GoodModelGroup1Interface $productModel, Member $creator, ?ProductClass $productClass = null): array
    {
        $aceProductId = $productModel->getGdid();
        $productStock = $productClass ? $productClass->getProductStock() : null;
        $product = $productClass ? $productClass->getProduct() : null;

        if (null === $productClass) {
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
    protected function getOrCreateTaxRule(ProductClass $productClass, Member $creator): TaxRule
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
    protected function enableOptionProductTaxRule(): void
    {
        $baseInfo = $this->baseInfo;
        if ($baseInfo->isOptionProductTaxRule()) {
            return;
        }

        $baseInfo->setOptionProductTaxRule(true);
        $this->entityManager->persist($baseInfo);
        $this->entityManager->flush($baseInfo);
    }

    /**
     * @param GoodTankaModelGroup1Interface[] $tankaModels
     *
     * @return array
     */
    protected function createSettingBag(array $tankaModels): array
    {
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
    protected function setStatus(
        GoodModelGroup1Interface $productModel,
        Product $product,
        ProductClass $productClass,
        array $settingBag,
    ): void {
        $displayAbolishedStatus = $settingBag['display_abolished_status'];

        if ($productModel->isSoftDelete()) {
            $product->setStatus($displayAbolishedStatus);

            return;
        }

        $status = $settingBag['display_show_status'];
        $displayHideStatus = $settingBag['display_hide_status'];

        // 商品の状態に応じてステータスを設定
        switch ($productModel->getTkbn()) {
            case AceProductOrderStatus::SUSPENDED:
                $status = $displayHideStatus;
                break;
            case AceProductOrderStatus::ABOLISHED:
                $status = $displayAbolishedStatus;
                break;
            default:
                // 商品の通常またはその以外は、VisibleをTrueとセット
                $productClass->setVisible(true);
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
    protected function resetSettingBagEntity(array $settingBag): array
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
     * @param LoggerInterface $logger ロガーインターフェース
     * @param array $settingBag 設定情報の配列
     * @param Member $creator 作成者
     *
     * @return void
     */
    protected function handleCreateProductFailed(GoodModelGroup1Interface $productModel, array $processedProductClasses, array &$options, LoggerInterface $logger, array &$settingBag, Member &$creator): void
    {
        $options['_failed_product_codes'][] = $productModel->getGdid();
        $this->entityManager = EntityManagerResetHelper::resetEntityManager($this->entityManager, $this->managerRegistry, $logger);
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
                $logger,
            );
            $settingBag['on_create_product_failed_event'] = $onCreateProductFailedEvent;
        } else {
            $onCreateProductFailedEvent->options = $options;
            $onCreateProductFailedEvent->entityManager = $this->entityManager;
            $onCreateProductFailedEvent->logger = $logger;
        }

        $this->eventDispatcher->dispatch($onCreateProductFailedEvent, Events::PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED);
        $options = $onCreateProductFailedEvent->options;
    }
}
