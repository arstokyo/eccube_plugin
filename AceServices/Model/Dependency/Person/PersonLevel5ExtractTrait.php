<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Trait for Person Level 5 Extract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel5ExtractTrait
{
    use PersonLevel1Trait, 
        PersonLevel2Trait, 
        PersonLevel3Trait, 
        PersonLevel4Trait, 
        PersonLevel5Trait;
}