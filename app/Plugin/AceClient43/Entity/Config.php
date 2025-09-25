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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Plugin\AceClient43\Entity\Constants\TransactionType;

if (!class_exists('\Plugin\AceClient43\Entity\Config', false)) {
    /**
     * Config
     *
     * @ORM\Table(name="plg_ace_client_config")
     *
     * @ORM\Entity(repositoryClass="Plugin\AceClient43\Repository\ConfigRepository")
     */
    class Config
    {
        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer", options={"unsigned":true})
         *
         * @ORM\Id
         *
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="base_uri", type="string", length=255, options={"default":"http://localhost:8080"})
         */
        private $baseUri = 'http://localhost:8080/';

        /**
         * @var bool
         *
         * @ORM\Column(name="is_log_on", type="boolean", options={"default":false})
         */
        private bool $isLogOn = true;

        /**
         * @var int
         *
         * @ORM\Column(name="syid", type="integer", length=1, options={"default":"1"})
         */
        private int $syid = 1;

        /**
         * @var int|null
         *
         * @ORM\Column(name="order_route_id", type="integer", length=1, nullable=true)
         */
        private ?int $order_route_id = null;

        /**
         * @var bool
         *
         * @ORM\Column(name="use_ace_delivery", type="boolean", options={"default":true})
         */
        private bool $use_ace_delivery = true;

        /**
         * @var bool
         *
         * @ORM\Column(name="use_ace_discount", type="boolean", options={"default":false})
         */
        private bool $use_ace_discount = false;

        /**
         * @var bool
         *
         * @ORM\Column(name="use_ace_charge", type="boolean", options={"default":false})
         */
        private bool $use_ace_charge = false;

        /**
         * @var bool
         *
         * @ORM\Column(name="validate_duplicate_entry", type="boolean", options={"default":true})
         */
        private bool $validate_duplicate_entry = true;

        /**
         * @var bool
         *
         * @ORM\Column(name="validate_duplicate_admin_entry", type="boolean", options={"default":true})
         */
        private bool $validate_duplicate_admin_entry = true;

        /**
         * @var bool
         *
         * @ORM\Column(name="redirect_forgot", type="boolean", options={"default":false})
         */
        private bool $redirect_forgot = false;

        /**
         * @var string
         *
         * @ORM\Column(name="forgot_path", type="string", length=255, options={"default":""})
         */
        private string $forgot_path = '';

        /**
         * @var int
         *
         * @ORM\Column(name="default_payment_id", type="integer", options={"default":0})
         */
        private int $default_payment_id = 0;

        /**
         * @var int
         *
         * @ORM\Column(name="default_transaction_type", type="integer", options={"default":0})
         */
        private int $default_transaction_type = TransactionType::SINGLE_PAYMENT;

        /**
         * @var bool
         *
         * @ORM\Column(name="enable_order_support", type="boolean", options={"default":false})
         */
        private bool $enable_order_support = false;

        /**
         * @var bool
         *
         * @ORM\Column(name="add_cart_index", type="boolean", options={"default":true})
         */
        private bool $add_cart_index = true;

        /**
         * @var bool
         *
         * @ORM\Column(name="add_cart_shopping", type="boolean", options={"default":false})
         */
        private bool $add_cart_shopping = false;

        /**
         * 顧客同期対象のルート一覧（JSON で保存）
         *
         * 保存形式の例：
         * [
         *   {"name": "mypage_top", "sync_address": true},
         *   {"name": "shopping",   "sync_address": false}
         * ]
         * 旧形式（文字列配列）も許容し、その場合は sync_address=true として扱う。
         *
         * @var array|null
         *
         * @ORM\Column(name="sync_customer_routes", type="json", nullable=true, options={"comment":"顧客同期対象ルート"})
         */
        private ?array $sync_customer_routes = null;

        /**
         * ACEからの付与ポイントを自動反映するかどうか
         *
         * @var bool
         *
         * @ORM\Column(name="add_point_from_ace", type="boolean", options={"default":false})
         */
        private bool $add_point_from_ace = false;

        /**
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getBaseUri()
        {
            return $this->baseUri;
        }

        /**
         * @param string $baseUri
         *
         * @return $this
         */
        public function setBaseUri($baseUri)
        {
            if (!\str_ends_with($baseUri, '/')) {
                $baseUri .= '/';
            }

            $this->baseUri = $baseUri;

            return $this;
        }

        /**
         * @return bool
         */
        public function getIsLogOn()
        {
            return $this->isLogOn;
        }

        /**
         * @param bool $isLogOn
         *
         * @return $this
         */
        public function setIsLogOn($isLogOn)
        {
            $this->isLogOn = $isLogOn;

            return $this;
        }

        /**
         * 通販AceのシステムIDを取得
         *
         * @return int
         */
        public function getSyid(): int
        {
            return $this->syid;
        }

        /**
         * 通販AceのシステムIDを設定
         *
         * @param int $syid
         *
         * @return $this
         */
        public function setSyid(int $syid)
        {
            $this->syid = $syid;

            return $this;
        }

        /**
         * 注文ルートIDを取得
         *
         * @return int|null
         */
        public function getOrderRouteId(): ?int
        {
            return $this->order_route_id;
        }

        /**
         * 注文ルートIDを設定
         *
         * @param int|null $order_route_id
         *
         * @return $this
         */
        public function setOrderRouteId(?int $order_route_id)
        {
            $this->order_route_id = $order_route_id;

            return $this;
        }

        /**
         * 注文ルートIDが設定されているかどうか
         *
         * @return bool
         */
        public function hasOrderRouteId(): bool
        {
            return !is_null($this->order_route_id);
        }

        /**
         * 配送手数料をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function getUseAceDelivery(): bool
        {
            return $this->use_ace_delivery;
        }

        /**
         * 配送手数料をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function shouldUseAceDelivery(): bool
        {
            return $this->getUseAceDelivery();
        }

        /**
         * 配送手数料をACE側の値を使用するかどうか設定
         *
         * @param bool $use_ace_delivery
         *
         * @return $this
         */
        public function setUseAceDelivery(bool $use_ace_delivery)
        {
            $this->use_ace_delivery = $use_ace_delivery;

            return $this;
        }

        /**
         * 割引をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function getUseAceDiscount(): bool
        {
            return $this->use_ace_discount;
        }

        /**
         * 割引をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function shouldUseAceDiscount(): bool
        {
            return $this->getUseAceDiscount();
        }

        /**
         * 割引をACE側の値を使用するかどうか設定
         *
         * @param bool $use_ace_discount
         *
         * @return $this
         */
        public function setUseAceDiscount(bool $use_ace_discount)
        {
            $this->use_ace_discount = $use_ace_discount;

            return $this;
        }

        /**
         * 手数料をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function getUseAceCharge(): bool
        {
            return $this->use_ace_charge;
        }

        /**
         * 手数料をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function shouldUseAceCharge(): bool
        {
            return $this->getUseAceCharge();
        }

        /**
         * 手数料をACE側の値を使用するかどうか設定
         *
         * @param bool $use_ace_charge
         *
         * @return $this
         */
        public function setUseAceCharge(bool $use_ace_charge)
        {
            $this->use_ace_charge = $use_ace_charge;

            return $this;
        }

        /**
         * 顧客登録時の顧客重複検証をするかどうか
         *
         * @return bool
         */
        public function getValidateDuplicateEntry(): bool
        {
            return $this->validate_duplicate_entry;
        }

        /**
         * 顧客登録時の顧客重複検証をするかどうか
         *
         * @return bool
         */
        public function shouldValidateDuplicateEntry(): bool
        {
            return $this->getValidateDuplicateEntry();
        }

        /**
         * 顧客登録時の顧客重複検証をするかどうか設定
         *
         * @param bool $validate_duplicate_entry
         *
         * @return $this
         */
        public function setValidateDuplicateEntry(bool $validate_duplicate_entry)
        {
            $this->validate_duplicate_entry = $validate_duplicate_entry;

            return $this;
        }

        /**
         * 管理画面での顧客編集時の顧客重複検証をするかどうか
         *
         * @return bool
         */
        public function getValidateDuplicateAdminEntry(): bool
        {
            return $this->validate_duplicate_admin_entry;
        }

        /**
         * 管理画面での顧客編集時の顧客重複検証をするかどうか
         *
         * @return bool
         */
        public function shouldValidateDuplicateAdminEntry(): bool
        {
            return $this->getValidateDuplicateAdminEntry();
        }

        /**
         * 管理画面での顧客編集時の顧客重複検証をするかどうか設定
         *
         * @param bool $validate_duplicate_admin_entry
         *
         * @return $this
         */
        public function setValidateDuplicateAdminEntry(bool $validate_duplicate_admin_entry)
        {
            $this->validate_duplicate_admin_entry = $validate_duplicate_admin_entry;

            return $this;
        }

        /**
         * 顧客登録時にEC側に顧客を存在せず、Ace側に顧客が存在する場合、パスワード忘れ画面にリダイレクトするかどうか
         *
         * @return bool
         */
        public function getRedirectForgot(): bool
        {
            return $this->redirect_forgot;
        }

        /**
         * 顧客登録時にEC側に顧客を存在せず、Ace側に顧客が存在する場合、パスワード忘れ画面にリダイレクトするかどうか
         *
         * @return bool
         */
        public function isRedirectForgot(): bool
        {
            return $this->getRedirectForgot();
        }

        /**
         * パスワード忘れ画面にリダイレクトするかどうか設定
         *
         * @param bool $redirect_forgot
         *
         * @return $this
         */
        public function setRedirectForgot(bool $redirect_forgot)
        {
            $this->redirect_forgot = $redirect_forgot;

            return $this;
        }

        /**
         * パスワード忘れ画面のパスを取得
         *
         * @return string
         */
        public function getForgotPath(): string
        {
            return $this->forgot_path;
        }

        /**
         * パスワード忘れ画面のパスが設定されているかどうか
         *
         * @return bool
         */
        public function hasForgotCustomerPath(): bool
        {
            return !empty($this->forgot_path);
        }

        /**
         * パスワード忘れ画面のパスを設定
         *
         * @param string $forgot_path
         *
         * @return $this
         */
        public function setForgotPath(string $forgot_path)
        {
            $this->forgot_path = $forgot_path;

            return $this;
        }

        /**
         * パスワード忘れ画面のパスが設定されているかどうか
         *
         * @return bool
         */
        public function hasForgotPath(): bool
        {
            return !empty($this->forgot_path);
        }

        /**
         * デフォルトの決済方法IDを取得
         *
         * @return int
         */
        public function getDefaultPaymentId(): int
        {
            return $this->default_payment_id;
        }

        /**
         * デフォルトの決済方法IDを設定
         *
         * @param int $default_payment_id
         *
         * @return $this
         */
        public function setDefaultPaymentId(int $default_payment_id)
        {
            $this->default_payment_id = $default_payment_id;

            return $this;
        }

        /**
         * デフォルトの取引区分を取得
         *
         * @return int
         */
        public function getDefaultTransactionType(): int
        {
            return $this->default_transaction_type;
        }

        /**
         * デフォルトの取引区分を設定
         *
         * @param int $default_transaction_type
         *
         * @return $this
         */
        public function setDefaultTransactionType(int $default_transaction_type)
        {
            $this->default_transaction_type = $default_transaction_type;

            return $this;
        }

        /**
         * Aceの受注サポート機能を有効にするかどうか
         *
         * @return bool
         */
        public function getEnableOrderSupport(): bool
        {
            return $this->enable_order_support;
        }

        /**
         * Aceの受注サポート機能を有効にするかどうか設定
         *
         * @param bool $enable_order_support
         *
         * @return $this
         */
        public function setEnableOrderSupport(bool $enable_order_support): self
        {
            $this->enable_order_support = $enable_order_support;

            return $this;
        }

        /**
         * Aceの受注サポート機能が有効かどうかを確認
         *
         * @return bool
         */
        public function isOrderSupportEnabled(): bool
        {
            return $this->getEnableOrderSupport();
        }

        /**
         * Aceの受注サポート機能を有効にする
         *
         * @return $this
         */
        public function enableOrderSupport()
        {
            return $this->setEnableOrderSupport(true);
        }

        /**
         * Aceの受注サポート機能を無効にする
         *
         * @return $this
         */
        public function disableOrderSupport()
        {
            return $this->setEnableOrderSupport(false);
        }

        /**
         * カート画面での通販Ace側にカート追加機能を有効にするかどうか
         *
         * @return bool
         */
        public function getAddCartIndex(): bool
        {
            return $this->add_cart_index;
        }

        /**
         * カート画面での通販Ace側にカート追加機能を有効にするかどうか
         *
         * @return bool
         */
        public function shouldAddCartIndex(): bool
        {
            return $this->getAddCartIndex();
        }

        /**
         * カート画面での通販Ace側にカート追加機能を有効にするかどうか設定
         *
         * @param bool $add_cart_index
         *
         * @return $this
         */
        public function setAddCartIndex(bool $add_cart_index): self
        {
            $this->add_cart_index = $add_cart_index;

            return $this;
        }

        /**
         * ショッピング画面での通販Ace側にカート追加機能を有効にするかどうか
         *
         * @return bool
         */
        public function getAddCartShopping(): bool
        {
            return $this->add_cart_shopping;
        }

        /**
         * ショッピング画面での通販Ace側にカート追加機能を有効にするかどうか
         *
         * @return bool
         */
        public function shouldAddCartShopping(): bool
        {
            return $this->getAddCartShopping();
        }

        /**
         * ショッピング画面での通販Ace側にカート追加機能を有効にするかどうか設定
         *
         * @param bool $add_cart_shopping
         *
         * @return $this
         */
        public function setAddCartShopping(bool $add_cart_shopping): self
        {
            $this->add_cart_shopping = $add_cart_shopping;

            return $this;
        }

        /**
         * 顧客同期対象のルート設定一覧を取得（正規化）
         *
         * 返却形式：
         * [
         *   ["name" => string, "sync_address" => bool],
         *   ...
         * ]
         *
         * 旧形式（文字列配列）は ["name" => 文字列, "sync_address" => true] として返却する。
         * name 重複時は後勝ちで統合する。
         *
         * @return array<int, array{name: string, sync_address: bool}>
         */
        public function getSyncCustomerRouteConfigs(): array
        {
            if ($this->sync_customer_routes === null) {
                return [];
            }

            $normalizedByName = [];
            foreach ($this->sync_customer_routes as $item) {
                $name = null;
                $syncAddress = true; // 旧形式互換：未指定は true

                if (is_string($item)) {
                    $name = $item;
                } elseif (is_array($item)) {
                    if (isset($item['name']) && is_string($item['name']) && $item['name'] !== '') {
                        $name = $item['name'];
                    }
                    if (array_key_exists('sync_address', $item)) {
                        $syncAddress = (bool) $item['sync_address'];
                    }
                }

                if ($name !== null && $name !== '') {
                    $normalizedByName[$name] = [
                        'name' => $name,
                        'sync_address' => $syncAddress,
                    ];
                }
            }

            return array_values($normalizedByName);
        }

        /**
         * 顧客同期対象のルート名一覧を取得
         *
         * @return string[] ルート名の配列（未設定時は空配列）
         */
        public function getSyncCustomerRoutes(): array
        {
            $configs = $this->getSyncCustomerRouteConfigs();
            $routes = [];
            foreach ($configs as $cfg) {
                if (isset($cfg['name']) && is_string($cfg['name']) && $cfg['name'] !== '') {
                    $routes[] = $cfg['name'];
                }
            }

            return $routes;
        }

        /**
         * 顧客同期対象のルート一覧を設定
         *
         * 許容する入力：
         * - 旧形式: string[]（ルート名の配列）
         * - 新形式: array<int, array{name: string, sync_address: bool}>
         *
         * @param array|null $routes
         *
         * @return $this
         */
        public function setSyncCustomerRoutes(?array $routes): self
        {
            if ($routes === null) {
                $this->sync_customer_routes = null;

                return $this;
            }

            $normalizedByName = [];
            foreach ($routes as $route) {
                $name = null;
                $syncAddress = true; // デフォルトは true（互換性維持）

                if (is_string($route)) {
                    $name = $route;
                } elseif (is_array($route)) {
                    if (isset($route['name']) && is_string($route['name']) && $route['name'] !== '') {
                        $name = $route['name'];
                    }
                    if (array_key_exists('sync_address', $route)) {
                        $syncAddress = (bool) $route['sync_address'];
                    }
                }

                if ($name !== null && $name !== '') {
                    $normalizedByName[$name] = [
                        'name' => $name,
                        'sync_address' => $syncAddress,
                    ];
                }
            }

            $this->sync_customer_routes = empty($normalizedByName) ? null : array_values($normalizedByName);

            return $this;
        }

        /**
         * ACEからの付与ポイント自動反映が有効かどうか
         */
        public function shouldAddPoint(): bool
        {
            return $this->add_point_from_ace;
        }

        /**
         * ACEからの付与ポイント自動反映の有効/無効を設定
         *
         * @return $this
         */
        public function setAddPointFromAce(bool $enabled): self
        {
            $this->add_point_from_ace = $enabled;

            return $this;
        }

        /**
         * 指定ルートで住所も同期すべきか
         *
         * @param string $route
         *
         * @return bool 見つからない場合は false
         */
        public function shouldSyncCustomerAddress(string $route): bool
        {
            foreach ($this->getSyncCustomerRouteConfigs() as $cfg) {
                if (isset($cfg['name']) && $cfg['name'] === $route) {
                    return (bool) ($cfg['sync_address'] ?? true);
                }
            }

            return false;
        }
    }
}
