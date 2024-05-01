<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Class Person Level 5 Extract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonLevel5Extract
{
    use PersonLevel1Trait, 
        PersonLevel2Trait, 
        PersonLevel3Trait, 
        PersonLevel4Trait, 
        PersonLevel5Trait;
}