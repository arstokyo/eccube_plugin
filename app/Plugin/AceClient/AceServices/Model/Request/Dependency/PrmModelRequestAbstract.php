<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Serialize\AsXmlTrait;

class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    use AsXmlTrait;

    function setXmlSerializeOptions(): array
    {
        return ['xml_format_output' => true,
                'xml_encoding' => 'Shift_JIS',];
    }

}

