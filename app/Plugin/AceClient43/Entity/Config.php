<?php

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Plugin\AceClient43\Util\HttpClient\HttpClientFactory;
use Plugin\AceClient43\Util\Logger\LoggerFactory;

if (!class_exists('\Plugin\AceClient43\Entity\Config', false)) {
    /**
     * Config
     *
     * @ORM\Table(name="plg_ace_client_config")
     * @ORM\Entity(repositoryClass="Plugin\AceClient43\Repository\ConfigRepository")
     */
    class Config
    {
        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer", options={"unsigned":true})
         * @ORM\Id
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

    }
}
