<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Plugin\AceClient\Utils\Denormalize\DTODenormalizerTrait;
use Plugin\AceClient\Utils\ContainerBuilder\ContainerBuilderFactory;

trait BaseConfigLoaderTrait
{
    use DTODenormalizerTrait;

    /**
     * Returns The Configuration Node Name.
     * 
     * @return string
     */
    abstract protected function getConfigRootNodeName(): string;

    /**
     * Returns The Configuration Model Class.
     * 
     * @return string
     */
    abstract protected function getConfigModelClass(): string;

    /**
     * Loads the configuration.
     * 
     * @return ConfigModelInterface
     */
    public function loadConfig(): ConfigModelInterface
    {
        $configs = $this->parseConfigToArray();
        return $this->denormalizeDTO($configs, $this->getConfigModelClass());
    }

    /**
     * Parses the configuration to an array.
     * 
     * @return array
     */
    private function parseConfigToArray(): array
    {
        $container = ContainerBuilderFactory::makeAceExtensionContainer();
        return $container->getParameter($this->getConfigRootNodeName());
    }

}