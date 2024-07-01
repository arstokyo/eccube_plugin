<?php

namespace Plugin\AceClient\Util\ConfigLoader;

use Plugin\AceClient\AceConfig\Model\ConfigModelInterface;
use Plugin\AceClient\AceConfig\Model\OverridableConfigInterface;
use Plugin\AceClient\Util\Denormalizer\DTO\DTODenormalizerTrait;
use Plugin\AceClient\Util\ConfigBuilder\ConfigBuilderInterface;
use Plugin\AceClient\Util\Serializer\AceConfigSerializer;
use Plugin\AceClient\Util\ConfigBuilder\DefaultConfigBuilder;
use Plugin\AceClient\Exception\NotDeserializableException;

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
     * @param ?AceConfigSerializer $serializer 
     * @param string $configBuilder
     * @param mixed $configOptions 
     * 
     * @return ConfigModelInterface|OverridableConfigInterface
     * @throws NotDeserializableException
     * @throws \InvalidArgumentException
     */
    final protected function loadConfig(?AceConfigSerializer $serializer = null, string $configBuilder = DefaultConfigBuilder::class, $configOptions = null)
    {
        if (!is_subclass_of($configBuilder, ConfigBuilderInterface::class)) {
            throw new \InvalidArgumentException(sprintf('The configBuilder must be an instance of %s', ConfigBuilderInterface::class));
        }

        $config = $configBuilder::build($configOptions);
        if (!isset($config[$this->getConfigRootNodeName()])) {
            throw new NotDeserializableException(sprintf('The config root node name %s is not found in the config', $this->getConfigRootNodeName()));
        }
        
        $config = $config[$this->getConfigRootNodeName()];
        if ($serializer) {
            $this->setSerializerForDTO($serializer);
        }

        return $this->denormalizeDTO($config, $this->getConfigModelClassName());
    }

}