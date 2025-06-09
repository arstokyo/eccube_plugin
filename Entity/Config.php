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
use Plugin\AceClient43\Util\HttpClient\HttpClientFactory;
use Plugin\AceClient43\Util\Logger\LoggerFactory;

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
        private $baseUri = HttpClientFactory::DEFAULT_BASE_URL;

        /**
         * @var bool
         *
         * @ORM\Column(name="is_log_on", type="boolean", options={"default":false})
         */
        private bool $isLogOn = LoggerFactory::DEFAULT_LOG_ON;

        /**
         * @var string
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
         * @ORM\Column(name="use_ace_delivery_fee_instead", type="boolean", options={"default":false})
         *
         * @var bool
         */
        private bool $use_ace_delivery_fee_instead = false;

        /**
         * @ORM\Column(name="use_ace_discount_instead", type="boolean", options={"default":false})
         *
         * @var bool
         */
        private bool $use_ace_discount_instead = false;

        /**
         * @ORM\Column(name="use_ace_charge_instead", type="boolean", options={"default":false})
         *
         * @var bool
         */
        private bool $use_ace_charge_instead = false;

        /**
         * @ORM\Column(name="validate_customer_existing", type="boolean", options={"default":true})
         *
         * @var bool
         */
        private bool $validate_customer_existing = true;

        /**
         * @ORM\Column(name="redirect_to_forgot_customer", type="boolean", options={"default":false})
         *
         * @var bool
         */
        private bool $redirect_to_forgot_customer = false;

        /**
         * @ORM\Column(name="forgot_customer_path", type="string", length=255, options={"default":""})
         *
         * @var string
         */
        private string $forgot_customer_path = '';

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
         * @ORM\Column(name="enable_order_support", type="boolean", options={"default":false})
         *
         * @var bool
         */
        private bool $enable_order_support = false;

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
         * @return $this;
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
         * @return $this;
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
         * 通販AceのシステムIDを取得
         *
         * @return string
         */
        public function setSyid(string $syid)
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
        public function isUseAceDeliveryFeeInstead(): bool
        {
            return $this->use_ace_delivery_fee_instead;
        }

        /**
         * 配送手数料をACE側の値を使用するかどうか設定
         *
         * @param bool $useAceDeliveryFeeInstead
         *
         * @return $this
         */
        public function setUseAceDeliveryFeeInstead(bool $useAceDeliveryFeeInstead)
        {
            $this->use_ace_delivery_fee_instead = $useAceDeliveryFeeInstead;

            return $this;
        }

        /**
         * 割引をACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function isUseAceDiscountInstead(): bool
        {
            return $this->use_ace_discount_instead;
        }

        /**
         * 割引をACE側の値を使用するかどうか設定
         *
         * @param bool $use_ace_discount_instead
         *
         * @return $this
         */
        public function setUseAceDiscountInstead(bool $use_ace_discount_instead)
        {
            $this->use_ace_discount_instead = $use_ace_discount_instead;

            return $this;
        }

        /**
         * 手数料ACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function setUseAceChargeInstead(bool $use_ace_charge_instead)
        {
            $this->use_ace_charge_instead = $use_ace_charge_instead;

            return $this;
        }

        /**
         * 手数料ACE側の値を使用するかどうか
         *
         * @return bool
         */
        public function isUseAceChargeInstead(): bool
        {
            return $this->use_ace_charge_instead;
        }

        /**
         *  顧客登録する時の顧客が存在するかどうかを検証するかどうか
         *
         * @param bool $validateCustomerExisting
         *
         * @return $this
         */
        public function setValidateCustomerExisting(bool $validateCustomerExisting)
        {
            $this->validate_customer_existing = $validateCustomerExisting;

            return $this;
        }

        /**
         * 顧客登録する時の顧客が存在するかどうかを検証するかどうか
         *
         * @return bool
         */
        public function needValidateCustomerExisting(): bool
        {
            return $this->validate_customer_existing;
        }

        /**
         * ロッグイン時、Ec側に顧客存在してないのにAce側に顧客が存在する場合、パスワードを忘れた画面にリダイレクトするかどうか
         *
         * @param bool $redirectToForgotCustomer
         *
         * @return $this
         */
        public function setRedirectToForgotCustomer(bool $redirectToForgotCustomer)
        {
            $this->redirect_to_forgot_customer = $redirectToForgotCustomer;

            return $this;
        }

        /**
         * ロッグイン時、Ec側に顧客存在してないのにAce側に顧客が存在する場合、パスワードを忘れた画面にリダイレクトするかどうか
         *
         * @return bool
         */
        public function isRedirectToForgotCustomerIfExistsOnAce(): bool
        {
            return $this->redirect_to_forgot_customer;
        }

        /**
         * パスワードを忘れた画面のパスを設定
         *
         * @param string $forgotCustomerPath
         *
         * @return $this
         */
        public function setForgotCustomerPath(string $forgotCustomerPath)
        {
            $this->forgot_customer_path = $forgotCustomerPath;

            return $this;
        }

        /**
         * パスワードを忘れた画面のパスを取得
         *
         * @return string
         */
        public function getForgotCustomerPath(): string
        {
            return $this->forgot_customer_path;
        }

        /**
         * パスワードを忘れた画面のパスが設定されているかどうか
         *
         * @return bool
         */
        public function hasForgotCustomerPath(): bool
        {
            return !empty($this->forgot_customer_path);
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
         * Aceの受注サポート機能を有効にするかどうかを設定
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
    }
}
