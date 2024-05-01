<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

class TestPersonConcept implements TestPersonConceptInterface
{
    use PersonLevel1Trait;
    use PersonLevel2Trait;
}