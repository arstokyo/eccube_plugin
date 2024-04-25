<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCartResponseModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class AddCartTest extends AbstractAdminWebTestCase
{
    public function regMmberModel(): Request\RequestModelInterface
    {
        $member = (new Request\Member\RegMember\RegMemberResponseModel)
                        ->setJmember((new Request\Jyuden\AddCart\PersonModel())->setCode('456'))
                        ->setSmember((new Request\Jyuden\AddCart\PersonModel())->setCode('123'))
                        ->setNmember((new Request\Jyuden\AddCart\NmemModel())->setEda(1));

        $prm = (new Request\Jyuden\AddCart\OrderPrmModel())->setMember($member);

        $addCartModel = (new Request\Jyuden\AddCart\AddCartRequestModel())
                             ->setId(7)
                             ->setSessid(1)
                             ->setPrm($prm);

        return $addCartModel;
    }

    public function testRequestAddCartMethod()
    {
        try {
            $addCartRequest = $this->getAddCartModel();
            $response = (new AceClient)->makeJyudenService()
                                       ->makeAddCartMethod()
                                       ->withRequest($addCartRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()
                                        ->getMessage()
                                        ->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals('受注先顧客が未指定です。', $message1);
    }

}