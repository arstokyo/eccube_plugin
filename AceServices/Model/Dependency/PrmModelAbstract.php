<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\Utils\Serialize\XmlSerializerTrait;

abstract class PrmModelAbstract implements PrmModelInterface
{
    use XmlSerializerTrait;
}