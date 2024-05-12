<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCartResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class AddCartTest extends AbstractAdminWebTestCase
{
    public function getAddCartModel(): Request\RequestModelInterface
    {
        $member = (new Request\Jyuden\AddCart\MemberOrderModel)
                        ->setJmember((new Request\Jyuden\AddCart\JmemberModel())->setCode('456'))
                        ->setSmember((new Request\Jyuden\AddCart\SmemberModel())->setCode('123'))
                        ->setNmember((new Request\Jyuden\AddCart\NmemberModel())->setEda(1));

        $prm = (new Request\Jyuden\AddCart\OrderPrmModel())->setMember($member);

        $addCartModel = (new Request\Jyuden\AddCart\AddCartRequestModel())
                             ->setId(7)
                             ->setSessId(1)
                             ->setPrm($prm);

        return $addCartModel;
    }

    public function testRequestAddCart()
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