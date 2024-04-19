<?php

namespace Plugin\AceClient\DependecyInjection;

use Acme\HelloBundle\DependencyInjection\UnconventionalExtensionClass;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Plugin\AceClient\Utils\Mapper\ConfigFileMapper;

class SoapSerializerDependencyInjectionBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new SoapSerializerExtension();
        }
        return $this->extension;
    }

}