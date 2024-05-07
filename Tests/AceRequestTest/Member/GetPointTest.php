<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\GetPoint\GetPointRequestModel;

class GetPointRequestModelTest extends AbstractAdminWebTestCase
{
    public function testCallGetPointRequestModel()
    {

        $point = new GetPointRequestModel();
        $point->setId(0)->setMcode("1234");
        $this->assertEquals(0, $point->getId());
        $this->assertEquals(1234, $point->getMcode());
    }
}