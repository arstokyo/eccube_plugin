<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Plugin\AceClient\Config\Model\OverridableConfigInterface;
use Plugin\AceClient\Utils\Denormalize\DTO\DTODenormalizerTrait;
use Plugin\AceClient\Utils\ContainerBuilder\ContainerBuilderFactory;

/**
 * Trait for BaseConfigLoader.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaseConfigLoaderTrait
{
    use DTODenormalizerTrait;

    /**
     * Returns The Configuration Root Node Name.
     * 
     * @return string
     */
    abstract protected function getConfigRootNodeName(): string;

    /**
     * Returns The Configuration Model Class Name.
     * 
     * @return string
     */
    abstract protected function getConfigModelClassName(): string;

    /**
     * Loads the configuration.
     * 
     * @return ConfigModelInterface|OverridableConfigInterface
     */
    final public function loadConfig(): ConfigModelInterface|OverridableConfigInterface
    {
        $configs = $this->parseConfigToArray();
        return $this->denormalizeDTO($configs, $this->getConfigModelClassName());
    }

    /**
     * Parses the configuration to an array.
     * 
     * @return array
     */
    private function parseConfigToArray(): array
    {
        return ContainerBuilderFactory::makeAceExtensionContainer()
                                       ->getParameter($this->getConfigRootNodeName());
    }

}