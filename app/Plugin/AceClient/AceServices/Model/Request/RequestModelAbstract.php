<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Symfony\Component\Serializer\Annotation\Ignore;

abstract class RequestModelAbstract implements RequestModelInterface
{

    /**
     * Compiles the property name with the class name.
     * 
     * @param string $property
     * @return string
     */
    protected function compilePropertyName(string $property): string
    {
        return $this::class . '.' . $property;
    }
}