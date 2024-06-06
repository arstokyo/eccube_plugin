<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Master;

use Plugin\AceClient\AceServices\Model\Response\Master\GetId\GetIdResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;


class GetIdRequestModelTest extends AceRequestTestAbtract
{
    public function testRequestGetIdOK()
    {
        try {
            $response = $this->aceClient->makeMasterService()
                                        ->makeGetIdMethod()
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetIdResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $syid13 = null;
                for($i = 0; $i < count($responseObj->getMaster()->getId()); $i++) {
                    $syid = $responseObj->getMaster()->getId()[$i];
                    if($syid->getId() === 13) {
                        $syid13 = $syid;
                        break;
                    }
                }
                $message1 = $responseObj->getMaster()->getMessage()->getMessage1();
                $message = $responseObj->getMaster()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(13, $syid13->getId());
        $this->assertEquals("EccubePluginテスト用", $syid13->getIdName());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}
