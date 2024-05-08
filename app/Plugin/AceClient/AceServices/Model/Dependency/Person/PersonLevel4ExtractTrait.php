<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Trait for Person Level 4 Extract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel4ExtractTrait
{
    use PersonLevel1Trait, 
        PersonLevel2Trait, 
        PersonLevel3Trait, 
        PersonLevel4Trait;
}