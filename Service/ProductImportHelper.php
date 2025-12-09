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
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * 商品インポートヘルパー
 *
 * 通販Ace APIから商品データを取得し、EC-CUBEの商品エンティティとして
 * インポートするためのヘルパークラス。
 *
 * ## 主な機能
 *
 * ### 1. インポートメソッド
 * - `import()`: GetGoods APIを使用した標準インポート **（非推奨）**
 * - `batchImport()`: V1 List APIを使用したバッチインポート **（推奨）**
 * - `importByAceProductIds()`: 商品IDによるインポート
 *
 * ### 2. フラッシュモード
 *
 * #### 即座フラッシュモード（デフォルト）
 * - `lazy_flush => false`
 * - 各商品を作成後すぐにデータベースに保存
 * - メモリ効率が良い
 * - エラー発生時は該当商品のみ失敗
 *
 * #### 遅延フラッシュモード（バッチ処理用）
 * - `lazy_flush => true`
 * - 複数商品をメモリ上に保持し、まとめて保存
 * - パフォーマンスが向上
 * - エラー発生時は成功した商品を先に保存してから回復
 * - バッチインポートで自動的に使用される
 *
 * ### 3. エラーハンドリング
 * - 商品作成エラー時に自動回復
 * - 遅延フラッシュモードでは未保存商品を自動保存
 * - エンティティマネージャーのリセットと再初期化
 * - 失敗した商品コードを `_failed_product_codes` に記録
 *
 * ### 4. イベントシステム
 * - `HELPER_PRE_IMPORT_PRODUCT`: インポート前処理
 * - `HELPER_POST_IMPORT_PRODUCT`: インポート後処理
 * - `PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT`: 商品作成時の処理
 * - `PRODUCT_IMPORT_HELPER_ON_SET_PRICE`: 価格設定時の処理
 * - `PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED`: エラー時の処理
 *
 * ## 使用例
 *
 * ```php
 * // ❌ 非推奨: 標準インポート（古いAPI）
 * // $count = $helper->import($creator, $dateFrom, $dateTo);
 *
 * // ✅ 推奨: バッチインポート（新しいAPI、高速）
 * $count = $helper->batchImport($creator, $dateFrom, $logger, $dateTo);
 *
 * // オプション指定
 * $options = [
 *     'lazy_flush' => true,
 *     'batch_size' => 100,
 *     '_product_import_helper.import_stock' => true,
 *     '_v1_list.tanka_kubuns' => [1, 2],
 * ];
 * $count = $helper->batchImport($creator, $dateFrom, $logger, $dateTo, $options);
 * ```
 *
 * @author Ars-Thong<v.t.nguyen@ar-system.co.jp>
 *
 * @see import() 標準インポート（非推奨）
 * @see batchImport() バッチインポート（推奨）
 * @see importByAceProductIds() 商品ID指定インポート
 */
class ProductImportHelper
{
    public const TRIGGER_IMPORT_WITH_GET_GOODS = 'product_import_helper.import_with_get_goods';

    public const TRIGGER_IMPORT_WITH_GET_ITEMS = 'product_import_helper.import_with_get_items';

    public const TRIGGER_IMPORT_WITH_V1_LIST = 'product_import_helper.import_with_v1_list';

    public array $defaultSetting = [
        'lazy_flush' => false,
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
     * @deprecated このメソッドは非推奨です。代わりに batchImport() を使用してください。
     *
     * **非推奨の理由:**
     * - GetGoods APIは古いAPI仕様
     * - パフォーマンスがbatchImport()より劣る
     * - メモリ使用量が多い
     * - ページネーション機能なし
     *
     * **移行方法:**
     * ```php
     * // 旧: import()
     * $count = $helper->import($creator, $dateFrom, $dateTo, $options, $logger);
     *
     * // 新: batchImport()（推奨）
     * $count = $helper->batchImport($creator, $dateFrom, $logger, $dateTo, $options);
     * ```
     *
     * @param Member $creator 作成者
     * @param \DateTime $updateFrom 更新対象開始日
     * @param \DateTime $updateTo 更新対象終了日
     * @param array $options オプション
     * @param LoggerInterface|null $logger コンソール出力インターフェース
     *
     * @return int インポートされた商品数
     *
     * @throws \Throwable
     *
     * @see batchImport() 推奨される新しいバッチインポートメソッド
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

        $options['_get_goods.import_stock'] = isset($options['_product_import_helper.import_stock']) && $options['_product_import_helper.import_stock'];

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
     * バッチインポート（V1 List API使用）
     *
     * @param Member $creator 作成者
     * @param \DateTime $updateFrom 更新対象開始日
     * @param LoggerInterface|null $logger コンソール出力インターフェース
     * @param \DateTime|null $updateTo 更新対象終了日
     * @param array $options オプション
     *
     * @return int インポートされた商品数
     *
     * @throws DataTypeMissMatchException|\Throwable
     */
    public function batchImport(
        Member &$creator,
        \DateTime $updateFrom,
        array $options = [],
        ?LoggerInterface $logger = null,
        ?\DateTime $updateTo = null,
        ?int $fromPage = null,
        ?int $maxPages = null,
    ): int {
        if ($logger === null) {
            $logger = $this->logger;
        }

        $options = array_merge(
            array_merge($this->defaultSetting, [
                '_trigger' => self::TRIGGER_IMPORT_WITH_V1_LIST,
                'lazy_flush' => true,
                '_v1_list.limit' => 100,
                '_v1_list.return_zaiko' => true,
                '_v1_list.skid' => null,
                '_v1_list.tanka_kubuns' => [],
                '_v1_list.free_kubuns' => [],
            ]),
            $options
        );

        // インポート前イベントをディスパッチ
        if ($this->eventDispatcher->hasListeners(Events::HELPER_PRE_IMPORT_PRODUCT)) {
            $request = [
                'update_from' => $updateFrom,
                'update_to' => $updateTo,
                'max_pages' => $maxPages,
                'from_page' => $fromPage,
            ];

            $event = new HelperPreImportProductEvent($request, $logger, $options);
            $this->eventDispatcher->dispatch($event, Events::HELPER_PRE_IMPORT_PRODUCT);

            $updateFrom = $event->request['update_from'];
            $updateTo = $event->request['update_to'];
            $maxPages = $event->request['max_pages'];
            $fromPage = $event->request['from_page'];
            $options = $event->options;
        }

        $processed = 0;
        $pagesProcessed = 0;
        $page = $fromPage ?? 1;

        do {
            $logger->info(sprintf('<info>ページ %d を処理中...</info>', $page));

            $resp = $this->productBridge->getV1List(
                $updateFrom,
                $updateTo,
                $page,
                $options['_v1_list.limit'],
                $options['_v1_list.return_zaiko'],
                $options['_v1_list.skid'],
                $options['_v1_list.tanka_kubuns'],
                $options['_v1_list.free_kubuns'],
                $options
            );

            $productModels = $resp->getItems();
            $logger->info(sprintf('<info>取得した商品数: %d</info>', count($productModels)));

            // 商品が取得できた場合のみ処理
            if (!empty($productModels)) {
                // バッチ処理用に商品を作成（遅延フラッシュモード）
                $createdProducts = $this->create($productModels, [], $creator, $logger, $options);
                $processed += count($createdProducts);

                try {
                    // バッチで作成した商品をデータベースに保存
                    $this->entityManager->flush();

                    if ($this->eventDispatcher->hasListeners(Events::HELPER_POST_IMPORT_PRODUCT)) {
                        $this->eventDispatcher->dispatch(
                            new HelperImportProductEvent($createdProducts, $productModels, [], $logger, $options),
                            Events::HELPER_POST_IMPORT_PRODUCT
                        );
                    }

                    // メモリ管理のためエンティティマネージャーをクリア
                    $this->entityManager->clear();

                    $logger->info(sprintf('<info>処理済み商品数: %d (累計: %d)</info>', count($createdProducts), $processed));
                } catch (\Throwable $e) {
                    // フラッシュエラーをログに記録
                    $logger->error(sprintf('<error>バッチフラッシュ中にエラーが発生しました: %s</error>', $e->getMessage()));

                    // エンティティマネージャーをリセットして回復
                    $this->entityManager = EntityManagerResetHelper::resetEntityManager(
                        $this->entityManager,
                        $this->managerRegistry,
                        $logger
                    );

                    // リセット後、作成者参照を更新
                    $creator = $this->entityManager->getRepository(Member::class)->find($creator->getId());

                    // 失敗したバッチをログに記録
                    $logger->warning(sprintf('<warning>ページ %d のフラッシュに失敗しました。次のページに進みます。</warning>', $page));
                }
            } else {
                $logger->warning('<warning>商品が取得できませんでした。</warning>');
            }

            // 次のページへ進む（常に実行）
            $hasMore = $resp->getHasMore();
            $page++;
            $pagesProcessed++;

            if ($maxPages !== null && $pagesProcessed >= $maxPages) {
                $logger->info(sprintf('<info>最大ページ数 %d に到達しました。</info>', $maxPages));
                $hasMore = false;
            }
        } while ($hasMore);

        $logger->info(sprintf('<info>バッチインポート完了: 合計 %d 商品を処理しました。</info>', $processed));

        return $processed;
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
     *
     * @throws \Throwable
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
                '_get_items.tanka_kubuns' => [],
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

        $payload = $this->productBridge->getItems($productIds, $options['_get_items.free_kubuns'], $options['_get_items.skid'], $options, $options['_get_items.tanka_kubuns']);
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
     * 通販Ace APIから取得した商品データをEC-CUBEの商品エンティティとして作成する。
     * 即座フラッシュモードと遅延フラッシュモードの2つの動作モードがある。
     *
     * ## フラッシュモード
     *
     * ### 即座フラッシュモード（`lazy_flush => false`、デフォルト）
     *
     * **動作フロー:**
     * ```
     * 商品A → persist → flush → DB保存 ✅
     * 商品B → persist → flush → DB保存 ✅
     * 商品C → エラー → handleCreateProductFailed → リセット → 続行
     * 商品D → persist → flush → DB保存 ✅
     * ```
     *
     * **特徴:**
     * - 各商品を作成後すぐにデータベースに保存
     * - メモリ使用量が少ない
     * - エラーが発生しても既に保存済みの商品は影響を受けない
     * - 商品数が少ない場合や、確実に1件ずつ保存したい場合に適している
     *
     * **エラーハンドリング:**
     * - エラー発生時はエンティティマネージャーをリセット
     * - 失敗した商品のみスキップして次の商品へ進む
     *
     * ### 遅延フラッシュモード（`lazy_flush => true`、バッチ処理用）
     *
     * **正常時の動作フロー:**
     * ```
     * 商品A → persist（保留）
     * 商品B → persist（保留）
     * 商品C → persist（保留）
     * ...
     * バッチ終了 → 呼び出し元でflush → 全商品を一括DB保存 ✅
     * ```
     *
     * **エラー時の動作フロー（重要）:**
     * ```
     * 商品A → persist（保留）
     * 商品B → persist（保留）
     * 商品C → エラー発生
     *   ↓
     *   1. 未保存の商品A、Bを先にflush → DB保存 ✅
     *   2. entityManager->clear()
     *   3. handleCreateProductFailed → リセット
     *   4. $processed = 0（カウンターリセット）
     *   ↓
     * 商品D → persist（保留）
     * 商品E → persist（保留）
     * ...
     * バッチ終了 → 呼び出し元でflush → 商品D、Eを一括DB保存 ✅
     * ```
     *
     * **特徴:**
     * - 複数商品をメモリ上に保持し、まとめて保存
     * - パフォーマンスが大幅に向上（データベースアクセス回数を削減）
     * - 大量の商品を扱うバッチ処理に適している
     *
     * **エラーハンドリング（フォールトトレラント設計）:**
     * - エラー発生時、**未保存の商品を失わない**ように自動保存
     * - `$processed`カウンターで未保存商品数を追跡
     * - エラー後もエンティティマネージャーをリセットして処理を継続
     * - 一部の商品でエラーが発生しても、成功した商品は全て保存される
     *
     * ## 処理の詳細
     *
     * 1. **商品データの取得または作成**
     *    - 既存商品の場合: DBから取得して更新
     *    - 新規商品の場合: 新しいエンティティを作成
     *
     * 2. **商品情報の設定**
     *    - 商品名、商品種別の設定
     *    - 単価情報の設定（`setPrice()`）
     *    - ステータスの設定（`setStatus()`）
     *    - 在庫情報の設定（オプション）
     *
     * 3. **イベントディスパッチ**
     *    - `PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT`: 商品作成時
     *    - `PRODUCT_IMPORT_HELPER_ON_SET_PRICE`: 価格設定時
     *    - `PRODUCT_IMPORT_HELPER_ON_CREATE_PRODUCT_FAILED`: エラー時
     *
     * 4. **エンティティの永続化**
     *    - persist で変更をマーク
     *    - フラッシュモードに応じてflush実行を制御
     *
     * ## オプション
     *
     * - `lazy_flush` (bool): 遅延フラッシュモードを有効にする（デフォルト: false）
     * - `_product_import_helper.create_new` (bool): 新規商品を作成する（デフォルト: true）
     * - `_product_import_helper.set_product_status` (bool): ステータスを設定する（デフォルト: true）
     * - `_product_import_helper.set_price` (bool): 価格を設定する（デフォルト: true）
     * - `_product_import_helper.import_stock` (bool): 在庫を更新する（デフォルト: true）
     * - `_product_import_helper.hide_on_new` (bool): 新規商品を非表示にする（デフォルト: false）
     *
     * @param GoodModelGroup1Interface[] $productModels 商品モデルの配列
     * @param GoodTankaModelGroup1Interface[] $tankaModels 単価モデルの配列（空配列の場合は商品モデルから取得）
     * @param Member $creator 作成者（参照渡し、エラー時に更新される可能性あり）
     * @param LoggerInterface $logger ロガー
     * @param array $options オプション設定（参照渡し、イベントで更新される可能性あり）
     *
     * @return array<string, ProductClass> 作成された商品クラスの配列（キー: Ace商品ID、値: ProductClass）
     *
     * @throws \Throwable 商品作成中にエラーが発生した場合（内部でキャッチして処理を継続）
     *
     * @see handleCreateProductFailed() 商品作成失敗時の処理
     */
    protected function create(array $productModels, array $tankaModels, Member &$creator, LoggerInterface $logger, array &$options = []): array
    {
        $settingBag = $this->createSettingBag($tankaModels);
        $processed = 0;
        $processedProductClasses = [];
        $lazyFlush = $options['lazy_flush'] ?? false;

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
                    $productClass->setVisible(true);
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

                if (!$lazyFlush) {
                    $entityManager->flush();
                }

                $processed++;
                $processedProductClasses[$aceProductId] = $productClass;
            } catch (\Throwable $e) {
                $logger->error(sprintf('<error>商品作成中にエラーが発生しました:%s</error>', $e->getMessage()));

                // エラーが発生した場合の処理
                if ($lazyFlush && $processed > 0) {
                    // 遅延フラッシュの場合は、成功した商品を先に保存してからリセット
                    try {
                        $this->entityManager->flush();
                        $logger->info(sprintf('<info>エラー発生前に %d 商品を保存しました</info>', $processed));

                        $this->entityManager->clear();
                    } catch (\Throwable $flushError) {
                        $logger->error(sprintf('<error>%d件の商品をフラッシュ中にエラーが発生しました: %s</error>', $processed, $flushError->getMessage()));
                    }

                    $processed = 0;
                }

                // エンティティマネージャーをリセット
                $this->handleCreateProductFailed($productModel, $processedProductClasses, $options, $logger, $settingBag, $creator);
            }
        }

        unset(
            $settingBag['on_create_product_event'],
            $settingBag['on_set_price_event'],
            $settingBag['on_create_product_failed_event']
        );

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
