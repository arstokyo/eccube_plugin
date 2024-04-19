<?php

namespace Plugin\AceClient\DependecyInjection;

use Acme\HelloBundle\DependencyInjection\UnconventionalExtensionClass;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

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