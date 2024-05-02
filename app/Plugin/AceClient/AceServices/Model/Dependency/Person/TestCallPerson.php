<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

class TestCallPerson
{
    public function testCallPerson()
    {
        $person = new TestPersonConcept();
        $person->setCode('123')->setAdr1('abc')->setAdr3('abc')->setKana('abc')->setSimei('abc');
    }
}