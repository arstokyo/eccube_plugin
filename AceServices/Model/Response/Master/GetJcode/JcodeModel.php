<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetJcode;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class JcodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class JcodeModel implements JcodeModelInterface
{
    use NoCategory\CodeTrait,
        NoCategory\NameTrait;
}
