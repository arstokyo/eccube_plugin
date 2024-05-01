<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Class Person Level 4 Extract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonLevel4Extract 
{
    use PersonLevel1Trait, 
        PersonLevel2Trait, 
        PersonLevel3Trait, 
        PersonLevel4Trait;
}