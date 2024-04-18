<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Serialize\AsXmlTrait;

abstract class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    use AsXmlTrait;

    protected function setXmlSerializeOptions(): array
    {
        return ['xml_format_output' => true,
                'xml_encoding' => 'Shift_JIS',];
    }

    abstract protected function setXmlRootNodeName(): string;

}

