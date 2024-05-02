<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCartResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\AceServices\Model\Dependency\Person\TestPersonConcept;

class AddCartTest extends AbstractAdminWebTestCase
{
    public function getAddCartModel(): Request\RequestModelInterface
    {
        $member = (new Request\Jyuden\AddCart\MemberOrderModel)
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

    public function testCallPerson()
    {
        $person = new TestPersonConcept();
        $person->setAdr4('abc')
                ->setZip('1234567')
                ->setSimei('abc')
                ->setTel('1234567890')
                ->setCode('123')
                ->setKana('abc')
                ->setAdr2('adr2');
        $this->assertEquals('123', $person->getCode());
    }

}