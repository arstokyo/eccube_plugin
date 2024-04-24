<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\MemberOrderModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\PersonModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\NmemModel;
use Plugin\AceClient\AceClient;

class JyudenRequestTest extends AbstractAdminWebTestCase
{
    public function getAddCartModel(): \Plugin\AceClient\AceServices\Model\Request\RequestModelInterface
    {
        $member = (new MemberOrderModel)
                        ->setJmember((new PersonModel())->setCode('456'))
                        ->setSmember((new PersonModel())->setCode('123'))
                        ->setNmember((new NmemModel())->setEda(1));

        $prm = (new OrderPrmModel())->setMember($member);

        $addCartModel = (new AddCartRequestModel())
                             ->setId(7)
                             ->setSessid(1)
                             ->setPrm($prm);

        return $addCartModel;
    }

    public function testRequestAddCartMethod()
    {
        $addCartRequest = $this->getAddCartModel();
        $response = (new AceClient)->makeJyudenService()
                                    ->makeAddCartMethod()
                                    ->withRequest($addCartRequest)
                                    ->send();
        var_dump($response);
        $this->assertTrue(true);
    }

}