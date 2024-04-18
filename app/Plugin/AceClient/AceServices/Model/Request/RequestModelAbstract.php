<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Symfony\Component\Serializer\Annotation\Ignore;

abstract class RequestModelAbstract implements RequestModelInterface
{
    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function ensureValidParameters(): bool
    {
        return true;
    }

}