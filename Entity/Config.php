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
         * @var int
         *
         * @ORM\Column(name="jyuchu_id", type="integer", length=1)
         */
        private int $jyuchuId;

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

        public function getSyid(): int
        {
            return $this->syid;
        }

        public function setSyid(string $syid)
        {
            $this->syid = $syid;

            return $this;
        }

        public function getJyuchuId(): int
        {
            return $this->jyuchuId;
        }

        public function setJyuchuId(int $jyuchuId)
        {
            $this->jyuchuId = $jyuchuId;

            return $this;
        }

        public function isUseAceDeliveryFeeInstead(): bool
        {
            return $this->use_ace_delivery_fee_instead;
        }

        public function setUseAceDeliveryFeeInstead(bool $useAceDeliveryFeeInstead)
        {
            $this->use_ace_delivery_fee_instead = $useAceDeliveryFeeInstead;

            return $this;
        }

        public function isUseAceDiscountInstead(): bool
        {
            return $this->use_ace_discount_instead;
        }

        public function setUseAceDiscountInstead(bool $use_ace_discount_instead)
        {
            $this->use_ace_discount_instead = $use_ace_discount_instead;

            return $this;
        }

        public function setUseAceChargeInstead(bool $use_ace_charge_instead)
        {
            $this->use_ace_charge_instead = $use_ace_charge_instead;

            return $this;
        }

        public function isUseAceChargeInstead(): bool
        {
            return $this->use_ace_charge_instead;
        }

        public function setValidateCustomerExisting(bool $validateCustomerExisting)
        {
            $this->validate_customer_existing = $validateCustomerExisting;

            return $this;
        }

        public function needValidateCustomerExisting(): bool
        {
            return $this->validate_customer_existing;
        }

        public function setRedirectToForgotCustomer(bool $redirectToForgotCustomer)
        {
            $this->redirect_to_forgot_customer = $redirectToForgotCustomer;

            return $this;
        }

        /**
         * @return bool
         */
        public function isRedirectToForgotCustomerIfExistsOnAce(): bool
        {
            return $this->redirect_to_forgot_customer;
        }

        public function setForgotCustomerPath(string $forgotCustomerPath)
        {
            $this->forgot_customer_path = $forgotCustomerPath;

            return $this;
        }

        public function getForgotCustomerPath(): string
        {
            return $this->forgot_customer_path;
        }

        public function hasForgotCustomerPath(): bool
        {
            return !empty($this->forgot_customer_path);
        }
    }
}
