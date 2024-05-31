<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
* Trait for HaisoModelGroup1
*
* @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
*/
trait HaisoModelGroup1Trait
{
    use NoCategory\SimeiTrait,
        Address\AdrTrait,
        PhoneAndPC\TelTrait,
        Address\ZipTrait,
        Haiso\OnameTrait;
}