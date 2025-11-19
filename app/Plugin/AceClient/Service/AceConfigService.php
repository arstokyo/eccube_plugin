<?php

namespace Plugin\AceClient43\Service;

use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Repository\ConfigRepository;

/**
 * AceClient設定キャッシュサービス
 *
 * AceClient設定の取得をキャッシュし、パフォーマンスを向上させる
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceConfigService
{
    private ConfigRepository $configRepository;

    /**
     * キャッシュされた設定
     *
     * @var Config|null
     */
    private ?Config $cachedConfig = null;

    /**
     * キャッシュが初期化されたかどうか
     *
     * @var bool
     */
    private bool $cacheInitialized = false;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * AceClient設定を取得（キャッシュ使用）
     *
     * @param bool $forceRefresh キャッシュを無視して新しいデータを取得
     *
     * @return Config|null
     */
    public function getConfig(bool $forceRefresh = false): ?Config
    {
        if (!$forceRefresh && $this->cacheInitialized) {
            return $this->cachedConfig;
        }

        $this->cachedConfig = $this->configRepository->get();
        $this->cacheInitialized = true;

        return $this->cachedConfig;
    }

    /**
     * キャッシュされた設定のみを取得（データベースアクセスなし）
     *
     * @return Config|null
     */
    public function getCachedConfigOnly(): ?Config
    {
        return $this->cacheInitialized ? $this->cachedConfig : null;
    }

    /**
     * キャッシュされた設定があるかチェック
     *
     * @return bool
     */
    public function hasCachedConfig(): bool
    {
        return $this->cacheInitialized && $this->cachedConfig !== null;
    }

    /**
     * 設定キャッシュをクリア
     *
     * @return void
     */
    public function clearCache(): void
    {
        $this->cachedConfig = null;
        $this->cacheInitialized = false;
    }

    /**
     * 設定を更新してキャッシュをリフレッシュ
     *
     * @param Config $config
     *
     * @return void
     */
    public function updateConfig(Config $config): void
    {
        $this->cachedConfig = $config;
        $this->cacheInitialized = true;
    }

    /**
     * システムIDを取得
     *
     * @return string|null
     *
     * @throws \LogicException
     */
    public function getSyid(): ?string
    {
        $config = $this->getConfig();
        if (!$config) {
            throw new \LogicException('AceClient設定が見つかりません。');
        }

        $syid = $config->getSyid();
        if (null === $syid) {
            throw new \LogicException('システムIDが設定されていません。');
        }

        return $syid;
    }

    /**
     * 設定が存在するかチェック
     *
     * @return bool
     */
    public function hasConfig(): bool
    {
        return $this->getConfig() !== null;
    }

    // 便利メソッド群（よく使用される設定へのショートカット）

    /**
     * デフォルト決済IDを取得
     *
     * @return string|null
     */
    public function getDefaultPaymentId(): ?string
    {
        $config = $this->getConfig();

        return $config ? $config->getDefaultPaymentId() : null;
    }

    /**
     * デフォルト取引タイプを取得
     *
     * @return string|null
     */
    public function getDefaultTransactionType(): ?string
    {
        $config = $this->getConfig();

        return $config ? $config->getDefaultTransactionType() : null;
    }

    /**
     * カート画面に受注サポートが有効かチェック
     *
     * @return bool
     */
    public function isOrderSupportEnabledWhenAddCart(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->isOrderSupportEnabledWhenAddCart() : false;
    }

    public function isOrderSupportEnabledWhenCheckout(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->isOrderSupportEnabledWhenCheckOut() : false;
    }

    /**
     * Ace送料を使用するかチェック
     *
     * @return bool
     */
    public function shouldUseAceDelivery(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldUseAceDelivery() : false;
    }

    /**
     * Ace割引を使用するかチェック
     *
     * @return bool
     */
    public function shouldUseAceDiscount(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldUseAceDiscount() : false;
    }

    /**
     * Ace手数料を使用するかチェック
     *
     * @return bool
     */
    public function shouldUseAceCharge(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldUseAceCharge() : false;
    }

    /**
     * ACEからの付与ポイント自動反映を行うか
     */
    public function shouldAddPoint(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldAddPoint() : false;
    }

    /**
     * カートインデックスに追加するかチェック
     *
     * @return bool
     */
    public function shouldAddCartIndex(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldAddCartIndex() : false;
    }

    /**
     * パスワードリセット画面にリダイレクトするかチェック
     *
     * @return bool
     */
    public function isRedirectForgot(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->isRedirectForgot() : false;
    }

    /**
     * 重複エントリーをバリデーションするかチェック
     *
     * @return bool
     */
    public function shouldValidateDuplicateEntry(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldValidateDuplicateEntry() : false;
    }

    /**
     * 管理画面での重複エントリーをバリデーションするかチェック
     *
     * @return bool
     */
    public function shouldValidateDuplicateAdminEntry(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->shouldValidateDuplicateAdminEntry() : false;
    }

    /**
     * 受注ルートIDを持っているかチェック
     *
     * @return bool
     */
    public function hasOrderRouteId(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->hasOrderRouteId() : false;
    }

    /**
     * 受注ルートIDを取得
     *
     * @return string|null
     */
    public function getOrderRouteId(): ?string
    {
        $config = $this->getConfig();

        return $config ? $config->getOrderRouteId() : null;
    }

    /**
     * 忘れパスワード顧客パスを持っているかチェック
     *
     * @return bool
     */
    public function hasForgotCustomerPath(): bool
    {
        $config = $this->getConfig();

        return $config ? $config->hasForgotCustomerPath() : false;
    }

    /**
     * 忘れパスワードパスを取得
     *
     * @return string|null
     */
    public function getForgotPath(): ?string
    {
        $config = $this->getConfig();

        return $config ? $config->getForgotPath() : null;
    }

    /**
     * ベースURIを取得
     *
     * @return string
     */
    public function getBaseUri(): string
    {
        $config = $this->getConfig();
        if (!$config) {
            throw new \LogicException('AceClient設定が見つかりません。');
        }

        $baseUri = $config->getBaseUri();
        if (null === $baseUri || empty($baseUri)) {
            throw new \LogicException('ベースURIが設定されていません。');
        }

        return $baseUri;
    }

    /**
     * 指定ルートで顧客同期を実施すべきか
     *
     * @param string $route
     *
     * @return bool
     */
    public function shouldSyncCustomerRoute(string $route): bool
    {
        $config = $this->getConfig();
        if (!$config) {
            return false;
        }

        $routes = $config->getSyncCustomerRoutes();
        if (empty($routes)) {
            return false;
        }

        foreach ($routes as $configuredRoute) {
            if ($configuredRoute === $route) {
                return true;
            }
        }

        return false;
    }

    /**
     * 指定ルートで住所も同期すべきか
     *
     * @param string $route
     *
     * @return bool
     */
    public function shouldSyncCustomerAddress(string $route): bool
    {
        $config = $this->getConfig();
        if (!$config) {
            return false;
        }

        return $config->shouldSyncCustomerAddress($route);
    }

    /**
     * 顧客同期のオプションを取得（ルート別）
     *
     * 現状は住所同期の有無のみを制御し、住所同期が必要な場合に
     *
     * 'return_alladr' => true を付与する。
     *
     * @param string $route
     *
     * @return array<string, mixed>
     */
    public function getCustomerSyncOptions(string $route): array
    {
        return $this->shouldSyncCustomerAddress($route)
            ? ['return_alladr' => true]
            : [];
    }

    // TODO: Change the hardcoded value to database setting
    public function shouldSyncProductOnAdminPage(): bool
    {
        return true;
    }

    public function shouldEnableOrderSupportOnCreateOrder(): bool
    {
        $config = $this->getConfig();
        if (!$config) {
            return false;
        }

        return $config->isOrderSupportEnabledWhenCheckOut();
    }
}
