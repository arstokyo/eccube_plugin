<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;
/**
* Class for HaisoGroupModel
*
* @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
*/
class HaisoModelGroup1 implements HaisoModelGroup1Interface
{
    use NoCategory\SimeiTrait,
        Address\AdrTrait,
        PhoneAndPC\TelTrait,
        Address\ZipTrait,
        Haiso\OnameTrait;
}