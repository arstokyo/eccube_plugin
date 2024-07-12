<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for Person Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel2Trait 
{
    use Address\FourAdrTrait,
        NoCategory\SimeiTrait,
        NoCategory\KanaTrait,
        Address\ZipTrait,
        PhoneAndPC\TelTrait;

}