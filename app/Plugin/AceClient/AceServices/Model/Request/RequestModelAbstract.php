<?php

namespace Plugin\AceClient43\AceServices\Model\Request;

/**
 * Abstract Class for Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class RequestModelAbstract implements RequestModelInterface
{
    /**
     * Compile the property name with the class name.
     * 
     * @param string $property
     * @return string
     */
    protected function compilePropertyName(string $property): string
    {
        return get_class($this) . '.' . $property;
    }
}