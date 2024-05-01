<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

class TestCallPerson
{
    public function testCallPerson()
    {
        $person = new PersonTestTrait();
        $person->setBikou1('bikou1')->setBikou2('bikou2')->setBikou3('bikou3');
    }
}