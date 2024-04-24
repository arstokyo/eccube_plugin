<?php

namespace Plugin\AceClient\Utils\ConfigWriter;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Plugin\AceClient\Config\Model\OverridableConfigInterface;
use Plugin\AceClient\Utils\Denormalize\DTO\DTODenormalizerTrait;
use Plugin\AceClient\Utils\ContainerBuilder\ContainerBuilderFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ConfigWriterTestor
{
    public function __construct()
    {
        $container = $this->createNewContainer();
        $container->setParameter('test', 'testParamerter');
    }

    /**
     * Create a new container.
     * 
     * @return ContainerBuilder
     */
    public function createNewContainer(): ContainerInterface 
    {
        return ContainerBuilderFactory::makeAceExtensionContainer();
    }
}