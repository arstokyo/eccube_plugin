<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\GetRireki\GetRirekiRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetRireki\GetRirekiResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\Utils\Serialize;


class GetRirekiRequestModelTest extends AbstractAdminWebTestCase
{
    public function testSearializeGetRireki()
    {
        $getReminderRequestModel = $this->getRirekiRequestForSerialize();
        $serializer = Serialize\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getReminderRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serialize\SoapXMLSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getRireki xmlns="{$xmlns}">
                <dispRow>10</dispRow>
                <dispPage>1</dispPage>
                <id>13</id>
                <mcode>2121</mcode>
            </getRireki>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getRirekiRequestForSerialize(): GetRirekiRequestModel
    {
        $rireki = new GetRirekiRequestModel();
        $getRireki = $rireki->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setMcode("2121")
                            ->setDispRow(10)
                            ->setDispPage(1);
        return $getRireki;
    }
    public function getModelRequestOneRow()
    {
        return (new GetRirekiRequestModel())
                ->setId(13)
                ->setMcode("109")
                ->setDispRow(1)
                ->setDispPage(1)
                ->setSort(1);
    }

    public function testRequestGetRirekiOneRow()
    {
        try {
            $getRirekiRequest = $this->getModelRequestOneRow();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetRirekiMethod()
                                       ->withRequest($getRirekiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $rireki = $responseObj->getMember()->getRireki()[0];
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(1, $rireki->getRno());
        $this->assertEquals("2024-05-15 17:49:48", $rireki->getDay()->toLongDate());
        $this->assertEquals(2, $rireki->getDenno());
        $this->assertEquals(4, $rireki->getMaxrow());
        $this->assertEquals("ECサイト", $rireki->getJname());
        $this->assertEquals("クレジットカード", $rireki->getPname());
        $this->assertEquals(12100, $rireki->getTotal());
        $this->assertEquals("受注", $rireki->getDenkbn());
        $this->assertEquals("受注", $rireki->getDenku());
        $this->assertEquals("GetRirekiTest", $rireki->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rireki->getAdr());
        $this->assertEquals("99999999", $rireki->getTel());
        $this->assertEquals("409-3861", $rireki->getZip());
        $this->assertEquals("999888777", $rireki->getOkurino());
        $this->assertEquals("佐川元払", $rireki->getOname());
        $this->assertEquals("2024-05-15", $rireki->getSdate()->toShortDate());
        $this->assertEquals(11000, $rireki->getGtotal());
        $this->assertEquals(500, $rireki->getSouryou());
        $this->assertEquals(600, $rireki->getTesuu());
        $this->assertEquals(0, $rireki->getNebiki());
        $this->assertEquals(12100, $rireki->getSyoukei());
        $this->assertEquals(0, $rireki->getPointP());
        $this->assertEquals(0, $rireki->getPointM());
        $this->assertEquals(12100, $rireki->getZandaka());
        $this->assertEquals("2024-05-31", $rireki->getSday()->toShortDate());
        $this->assertEquals("2024-06-29", $rireki->getUday()->toShortDate());
        $this->assertEquals("2024-06-29", $rireki->getNday()->toShortDate());
        $this->assertEquals(null, $rireki->getHday());
        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());

    }

    public function getModelRequestThreeRow()
    {
        return (new GetRirekiRequestModel())
                ->setId(13)
                ->setMcode("109")
                ->setDispRow(3)
                ->setDispPage(1)
                ->setSort(1);
    }

    public function testRequestGetRirekiThreeRow()
    {
        try {
            $getRirekiRequest = $this->getModelRequestThreeRow();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetRirekiMethod()
                                       ->withRequest($getRirekiRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $rireki1 = $responseObj->getMember()->getRireki()[0];
                $rireki2 = $responseObj->getMember()->getRireki()[1];
                $rireki3 = $responseObj->getMember()->getRireki()[2];
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(1, $rireki1->getRno());
        $this->assertEquals("2024-05-15 17:49:48", $rireki1->getDay()->toLongDate());
        $this->assertEquals(2, $rireki1->getDenno());
        $this->assertEquals(4, $rireki1->getMaxrow());
        $this->assertEquals("ECサイト", $rireki1->getJname());
        $this->assertEquals("クレジットカード", $rireki1->getPname());
        $this->assertEquals(12100, $rireki1->getTotal());
        $this->assertEquals("受注", $rireki1->getDenkbn());
        $this->assertEquals("受注", $rireki1->getDenku());
        $this->assertEquals("GetRirekiTest", $rireki1->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rireki1->getAdr());
        $this->assertEquals("99999999", $rireki1->getTel());
        $this->assertEquals("409-3861", $rireki1->getZip());
        $this->assertEquals("999888777", $rireki1->getOkurino());
        $this->assertEquals("佐川元払", $rireki1->getOname());
        $this->assertEquals("2024-05-15", $rireki1->getSdate()->toShortDate());
        $this->assertEquals(11000, $rireki1->getGtotal());
        $this->assertEquals(500, $rireki1->getSouryou());
        $this->assertEquals(600, $rireki1->getTesuu());
        $this->assertEquals(0, $rireki1->getNebiki());
        $this->assertEquals(12100, $rireki1->getSyoukei());
        $this->assertEquals(0, $rireki1->getPointP());
        $this->assertEquals(0, $rireki1->getPointM());
        $this->assertEquals(12100, $rireki1->getZandaka());
        $this->assertEquals("2024-05-31", $rireki1->getSday()->toShortDate());
        $this->assertEquals("2024-06-29", $rireki1->getUday()->toShortDate());
        $this->assertEquals("2024-06-29", $rireki1->getNday()->toShortDate());
        $this->assertEquals(null, $rireki1->getHday());


        $this->assertEquals(2, $rireki2->getRno());
        $this->assertEquals("2024-05-15 19:17:53", $rireki2->getDay()->toLongDate());
        $this->assertEquals(3, $rireki2->getDenno());
        $this->assertEquals(4, $rireki2->getMaxrow());
        $this->assertEquals("コールセンター", $rireki2->getJname());
        $this->assertEquals("クレジットカード", $rireki2->getPname());
        $this->assertEquals(8600, $rireki2->getTotal());
        $this->assertEquals("受注", $rireki2->getDenkbn());
        $this->assertEquals("受注", $rireki2->getDenku());
        $this->assertEquals("GetRirekiTestNmem", $rireki2->getSimei());
        $this->assertEquals("福井県敦賀市莇生野", $rireki2->getAdr());
        $this->assertEquals("123445566", $rireki2->getTel());
        $this->assertEquals("914-0141", $rireki2->getZip());
        $this->assertEquals("9887766555", $rireki2->getOkurino());
        $this->assertEquals("佐川元払", $rireki2->getOname());
        $this->assertEquals("2024-05-15", $rireki2->getSdate()->toShortDate());
        $this->assertEquals(5600, $rireki2->getGtotal());
        $this->assertEquals(0, $rireki2->getSouryou());
        $this->assertEquals(3000, $rireki2->getTesuu());
        $this->assertEquals(0, $rireki2->getNebiki());
        $this->assertEquals(8600, $rireki2->getSyoukei());
        $this->assertEquals(0, $rireki2->getPointP());
        $this->assertEquals(0, $rireki2->getPointM());
        $this->assertEquals(8600, $rireki2->getZandaka());
        $this->assertEquals("2024-06-30", $rireki2->getSday()->toShortDate());
        $this->assertEquals("2024-07-02", $rireki2->getUday()->toShortDate());
        $this->assertEquals("2024-07-02", $rireki2->getNday()->toShortDate());
        $this->assertEquals(null, $rireki2->getHday());


        $this->assertEquals(3, $rireki3->getRno());
        $this->assertEquals("2024-05-15 17:39:40", $rireki3->getDay()->toLongDate());
        $this->assertEquals(1, $rireki3->getDenno());
        $this->assertEquals(4, $rireki3->getMaxrow());
        $this->assertEquals("ECサイト", $rireki3->getJname());
        $this->assertEquals("クレジットカード", $rireki3->getPname());
        $this->assertEquals(9200, $rireki3->getTotal());
        $this->assertEquals("受注", $rireki3->getDenkbn());
        $this->assertEquals("受注", $rireki3->getDenku());
        $this->assertEquals("GetRirekiTest", $rireki3->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rireki3->getAdr());
        $this->assertEquals("99999999", $rireki3->getTel());
        $this->assertEquals("409-3861", $rireki3->getZip());
        $this->assertEquals("99998887777", $rireki3->getOkurino());
        $this->assertEquals("ヤマト", $rireki3->getOname());
        $this->assertEquals("2024-05-16", $rireki3->getSdate()->toShortDate());
        $this->assertEquals(2000, $rireki3->getGtotal());
        $this->assertEquals(500, $rireki3->getSouryou());
        $this->assertEquals(700, $rireki3->getTesuu());
        $this->assertEquals(0, $rireki3->getNebiki());
        $this->assertEquals(3200, $rireki3->getSyoukei());
        $this->assertEquals(0, $rireki3->getPointP());
        $this->assertEquals(0, $rireki3->getPointM());
        $this->assertEquals(3200, $rireki3->getZandaka());
        $this->assertEquals("2024-05-29", $rireki3->getSday()->toShortDate());
        $this->assertEquals("2024-05-31", $rireki3->getUday()->toShortDate());
        $this->assertEquals("2024-05-23", $rireki3->getNday()->toShortDate());
        $this->assertEquals("2024-05-23", $rireki3->getHday()->toShortDate());


        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());

    }
}