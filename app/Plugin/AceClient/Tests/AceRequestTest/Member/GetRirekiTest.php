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
        print $message1;

        $this->assertEquals(1, $rireki->getRno());
        $this->assertEquals("2024-05-15 17:49:48", $rireki->getDay()->toLongDate());
        $this->assertEquals(2, $rireki->getDenno());
        $this->assertEquals(3, $rireki->getMaxrow());
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

    }
}