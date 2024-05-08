<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Address\FourAdrTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Person Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonLevel2Trait implements PersonLevel2Interface
{
    use FourAdrTrait,
        NoCategory\SimeiTrait,
        NoCategory\KanaTrait,
        NoCategory\ZipTrait,
        NoCategory\TelTrait;

}