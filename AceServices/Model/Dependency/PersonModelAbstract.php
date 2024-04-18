<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PersonModelAbstract implements PersonModelInterface
{
    
    /** @var string Person Code  */
    #[SerializedName('code')]
    protected string $code;

}