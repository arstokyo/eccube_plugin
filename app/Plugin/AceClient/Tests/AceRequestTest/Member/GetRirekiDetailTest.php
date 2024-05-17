<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Member;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Member\GetRirekiDetail\GetRirekiDetailRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Member\GetRirekiDetail\GetRirekiDetailResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;
use Plugin\AceClient\Utils\Serialize;


class GetRirekiDetailRequestModelTest extends AbstractAdminWebTestCase
{
    public function testSearializeGetRirekiDetail()
    {
        $getRirekiDetailRequestModel = $this->getRirekiDetailRequestForSerialize();
        $serializer = Serialize\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getRirekiDetailRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serialize\SoapXMLSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serialize\SoapXMLSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getRirekiDetail xmlns="{$xmlns}">
                <id>13</id>
                <mcode>2121</mcode>
                <denno>10</denno>
                <denku>1</denku>
            </getRirekiDetail>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function getRirekiDetailRequestForSerialize(): GetRirekiDetailRequestModel
    {
        $rirekiDetail = new GetRirekiDetailRequestModel();
        $getRirekiDetail = $rirekiDetail->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setMcode("2121")
                            ->setDenno(10)
                            ->setDenku(1);
        return $getRirekiDetail;
    }

    public function getRirekiDetailRequestOK(): GetRirekiDetailRequestModel
    {
        $rirekiDetail = new GetRirekiDetailRequestModel();
        $getRirekiDetail = $rirekiDetail->setId(OverviewMapper::ACE_TEST_SYID)
                            ->setMcode(109)
                            ->setDenno(1)
                            ->setDenku(0);
        return $getRirekiDetail;
    }


    public function testRequestGetRirekiDetailOK()
    {
        try {
            $getRirekiDetailRequest = $this->getRirekiDetailRequestOK();
            $response = (new AceClient)->makeMemberService()
                                       ->makeGetRirekiDetailMethod()
                                       ->withRequest($getRirekiDetailRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetRirekiDetailResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $rirekiDetail1 = $responseObj->getMember()->getRirekiDetail()[0];
                $rirekiDetail2 = $responseObj->getMember()->getRirekiDetail()[1];
                $rirekiDetail3 = $responseObj->getMember()->getRirekiDetail()[2];
                $rirekiDetail4 = $responseObj->getMember()->getRirekiDetail()[3];
                $mailJyuden1 = $responseObj->getMember()->getMailJyuden()[0];
                $mailJyuden2 = $responseObj->getMember()->getMailJyuden()[1];
                $message = $responseObj->getMember()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals("100", $rirekiDetail1->getGcode());
        $this->assertEquals("商品100", $rirekiDetail1->getGname());
        $this->assertEquals(2, $rirekiDetail1->getSuu());
        $this->assertEquals(1000, $rirekiDetail1->getTanka());
        $this->assertEquals(2000, $rirekiDetail1->getMoney());
        $this->assertEquals("2024-05-15", $rirekiDetail1->getJday()->toShortDate());
        $this->assertEquals(10, $rirekiDetail1->getPcode());
        $this->assertEquals("コンビニ", $rirekiDetail1->getPname());
        $this->assertEquals(10, $rirekiDetail1->getHcode());
        $this->assertEquals(0, $rirekiDetail1->getPointm());
        $this->assertEquals(0, $rirekiDetail1->getPointp());
        $this->assertEquals(180, $rirekiDetail1->getUtax());
        $this->assertEquals(0, $rirekiDetail1->getStax());
        $this->assertEquals("GetRirekiTest", $rirekiDetail1->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rirekiDetail1->getAdr());
        $this->assertEquals("99999999", $rirekiDetail1->getTel());
        $this->assertEquals("409-3861", $rirekiDetail1->getZip());
        $this->assertEquals("99998887777", $rirekiDetail1->getOkurino());
        $this->assertEquals("ヤマト", $rirekiDetail1->getOname());
        $this->assertEquals("ヤマト", $rirekiDetail1->getHname());
        $this->assertEquals("2024-05-16", $rirekiDetail1->getSdate()->toShortDate());
        $this->assertEquals("受注", $rirekiDetail1->getDenkbn());
        $this->assertEquals("2024-05-23", $rirekiDetail1->getHday()->toShortDate());
        $this->assertEquals("14:00~16:00", $rirekiDetail1->getHkname());
        $this->assertEquals("受注", $rirekiDetail1->getDenku());
        $this->assertEquals(0, $rirekiDetail1->getCkbn());
        $this->assertEquals(0, $rirekiDetail1->getGkbn());
        $this->assertEquals("109", $rirekiDetail1->getMcode());
        $this->assertEquals("", $rirekiDetail1->getMbikou());
        $this->assertEquals(1, $rirekiDetail1->getDenno());
        $this->assertEquals(0, $rirekiDetail1->getGiftno());
        $this->assertEquals(0, $rirekiDetail1->getDenkuNum());
        $this->assertEquals("2024-05-15 00:00:00", $rirekiDetail1->getDay()->toLongDate());
        $this->assertEquals(1, $rirekiDetail1->getLine());
        $this->assertEquals("", $rirekiDetail1->getFcode1());
        $this->assertEquals("", $rirekiDetail1->getFcode2());
        $this->assertEquals("", $rirekiDetail1->getFcode3());
        $this->assertEquals("", $rirekiDetail1->getDbikou1());
        $this->assertEquals("", $rirekiDetail1->getDbikou2());
        $this->assertEquals("", $rirekiDetail1->getDbikou3());
        $this->assertEquals("", $rirekiDetail1->getNbikou1());
        $this->assertEquals("", $rirekiDetail1->getNbikou2());
        $this->assertEquals("", $rirekiDetail1->getObikou1());
        $this->assertEquals("", $rirekiDetail1->getObikou2());
        $this->assertEquals("", $rirekiDetail1->getFmemo1());
        $this->assertEquals("", $rirekiDetail1->getFmemo2());
        $this->assertEquals("", $rirekiDetail1->getFmemo3());
        $this->assertEquals("ECサイト", $rirekiDetail1->getJname());


        $this->assertEquals("101", $rirekiDetail2->getGcode());
        $this->assertEquals("商品101", $rirekiDetail2->getGname());
        $this->assertEquals(3, $rirekiDetail2->getSuu());
        $this->assertEquals(2000, $rirekiDetail2->getTanka());
        $this->assertEquals(6000, $rirekiDetail2->getMoney());
        $this->assertEquals("2024-05-15", $rirekiDetail2->getJday()->toShortDate());
        $this->assertEquals(10, $rirekiDetail2->getPcode());
        $this->assertEquals("コンビニ", $rirekiDetail2->getPname());
        $this->assertEquals(10, $rirekiDetail2->getHcode());
        $this->assertEquals(0, $rirekiDetail2->getPointm());
        $this->assertEquals(0, $rirekiDetail2->getPointp());
        $this->assertEquals(543, $rirekiDetail2->getUtax());
        $this->assertEquals(0, $rirekiDetail2->getStax());
        $this->assertEquals("GetRirekiTest", $rirekiDetail2->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rirekiDetail2->getAdr());
        $this->assertEquals("99999999", $rirekiDetail2->getTel());
        $this->assertEquals("409-3861", $rirekiDetail2->getZip());
        $this->assertEquals("99998887777", $rirekiDetail2->getOkurino());
        $this->assertEquals("ヤマト", $rirekiDetail2->getOname());
        $this->assertEquals("ヤマト", $rirekiDetail2->getHname());
        $this->assertEquals("2024-05-16", $rirekiDetail2->getSdate()->toShortDate());
        $this->assertEquals("受注", $rirekiDetail2->getDenkbn());
        $this->assertEquals("2024-05-23", $rirekiDetail2->getHday()->toShortDate());
        $this->assertEquals("14:00~16:00", $rirekiDetail2->getHkname());
        $this->assertEquals("受注", $rirekiDetail2->getDenku());
        $this->assertEquals(0, $rirekiDetail2->getCkbn());
        $this->assertEquals(0, $rirekiDetail2->getGkbn());
        $this->assertEquals("109", $rirekiDetail2->getMcode());
        $this->assertEquals("", $rirekiDetail2->getMbikou());
        $this->assertEquals(1, $rirekiDetail2->getDenno());
        $this->assertEquals(0, $rirekiDetail2->getGiftno());
        $this->assertEquals(0, $rirekiDetail2->getDenkuNum());
        $this->assertEquals("2024-05-15 00:00:00", $rirekiDetail2->getDay()->toLongDate());
        $this->assertEquals(2, $rirekiDetail2->getLine());
        $this->assertEquals("", $rirekiDetail2->getFcode1());
        $this->assertEquals("", $rirekiDetail2->getFcode2());
        $this->assertEquals("", $rirekiDetail2->getFcode3());
        $this->assertEquals("", $rirekiDetail2->getDbikou1());
        $this->assertEquals("", $rirekiDetail2->getDbikou2());
        $this->assertEquals("", $rirekiDetail2->getDbikou3());
        $this->assertEquals("", $rirekiDetail2->getNbikou1());
        $this->assertEquals("", $rirekiDetail2->getNbikou2());
        $this->assertEquals("", $rirekiDetail2->getObikou1());
        $this->assertEquals("", $rirekiDetail2->getObikou2());
        $this->assertEquals("", $rirekiDetail2->getFmemo1());
        $this->assertEquals("", $rirekiDetail2->getFmemo2());
        $this->assertEquals("", $rirekiDetail2->getFmemo3());
        $this->assertEquals("ECサイト", $rirekiDetail2->getJname());


        $this->assertEquals("s-1", $rirekiDetail3->getGcode());
        $this->assertEquals("送料1", $rirekiDetail3->getGname());
        $this->assertEquals(1, $rirekiDetail3->getSuu());
        $this->assertEquals(500, $rirekiDetail3->getTanka());
        $this->assertEquals(500, $rirekiDetail3->getMoney());
        $this->assertEquals("2024-05-15", $rirekiDetail3->getJday()->toShortDate());
        $this->assertEquals(10, $rirekiDetail3->getPcode());
        $this->assertEquals("コンビニ", $rirekiDetail3->getPname());
        $this->assertEquals(10, $rirekiDetail3->getHcode());
        $this->assertEquals(0, $rirekiDetail3->getPointm());
        $this->assertEquals(0, $rirekiDetail3->getPointp());
        $this->assertEquals(45, $rirekiDetail3->getUtax());
        $this->assertEquals(0, $rirekiDetail3->getStax());
        $this->assertEquals("GetRirekiTest", $rirekiDetail3->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rirekiDetail3->getAdr());
        $this->assertEquals("99999999", $rirekiDetail3->getTel());
        $this->assertEquals("409-3861", $rirekiDetail3->getZip());
        $this->assertEquals("99998887777", $rirekiDetail3->getOkurino());
        $this->assertEquals("ヤマト", $rirekiDetail3->getOname());
        $this->assertEquals("ヤマト", $rirekiDetail3->getHname());
        $this->assertEquals("2024-05-16", $rirekiDetail3->getSdate()->toShortDate());
        $this->assertEquals("受注", $rirekiDetail3->getDenkbn());
        $this->assertEquals("2024-05-23", $rirekiDetail3->getHday()->toShortDate());
        $this->assertEquals("14:00~16:00", $rirekiDetail3->getHkname());
        $this->assertEquals("受注", $rirekiDetail3->getDenku());
        $this->assertEquals(0, $rirekiDetail3->getCkbn());
        $this->assertEquals(1, $rirekiDetail3->getGkbn());
        $this->assertEquals("109", $rirekiDetail3->getMcode());
        $this->assertEquals("", $rirekiDetail3->getMbikou());
        $this->assertEquals(1, $rirekiDetail3->getDenno());
        $this->assertEquals(0, $rirekiDetail3->getGiftno());
        $this->assertEquals(0, $rirekiDetail3->getDenkuNum());
        $this->assertEquals("2024-05-15 00:00:00", $rirekiDetail3->getDay()->toLongDate());
        $this->assertEquals(3, $rirekiDetail3->getLine());
        $this->assertEquals("", $rirekiDetail3->getFcode1());
        $this->assertEquals("", $rirekiDetail3->getFcode2());
        $this->assertEquals("", $rirekiDetail3->getFcode3());
        $this->assertEquals("", $rirekiDetail3->getDbikou1());
        $this->assertEquals("", $rirekiDetail3->getDbikou2());
        $this->assertEquals("", $rirekiDetail3->getDbikou3());
        $this->assertEquals("", $rirekiDetail3->getNbikou1());
        $this->assertEquals("", $rirekiDetail3->getNbikou2());
        $this->assertEquals("", $rirekiDetail3->getObikou1());
        $this->assertEquals("", $rirekiDetail3->getObikou2());
        $this->assertEquals("", $rirekiDetail3->getFmemo1());
        $this->assertEquals("", $rirekiDetail3->getFmemo2());
        $this->assertEquals("", $rirekiDetail3->getFmemo3());
        $this->assertEquals("ECサイト", $rirekiDetail3->getJname());


        $this->assertEquals("d-1", $rirekiDetail4->getGcode());
        $this->assertEquals("代引き手数料1", $rirekiDetail4->getGname());
        $this->assertEquals(1, $rirekiDetail4->getSuu());
        $this->assertEquals(700, $rirekiDetail4->getTanka());
        $this->assertEquals(700, $rirekiDetail4->getMoney());
        $this->assertEquals("2024-05-15", $rirekiDetail4->getJday()->toShortDate());
        $this->assertEquals(10, $rirekiDetail4->getPcode());
        $this->assertEquals("コンビニ", $rirekiDetail4->getPname());
        $this->assertEquals(10, $rirekiDetail4->getHcode());
        $this->assertEquals(0, $rirekiDetail4->getPointm());
        $this->assertEquals(0, $rirekiDetail4->getPointp());
        $this->assertEquals(63, $rirekiDetail4->getUtax());
        $this->assertEquals(0, $rirekiDetail4->getStax());
        $this->assertEquals("GetRirekiTest", $rirekiDetail4->getSimei());
        $this->assertEquals("山梨県中巨摩郡昭和町紙漉阿原", $rirekiDetail4->getAdr());
        $this->assertEquals("99999999", $rirekiDetail4->getTel());
        $this->assertEquals("409-3861", $rirekiDetail4->getZip());
        $this->assertEquals("99998887777", $rirekiDetail4->getOkurino());
        $this->assertEquals("ヤマト", $rirekiDetail4->getOname());
        $this->assertEquals("ヤマト", $rirekiDetail4->getHname());
        $this->assertEquals("2024-05-16", $rirekiDetail4->getSdate()->toShortDate());
        $this->assertEquals("受注", $rirekiDetail4->getDenkbn());
        $this->assertEquals("2024-05-23", $rirekiDetail4->getHday()->toShortDate());
        $this->assertEquals("14:00~16:00", $rirekiDetail4->getHkname());
        $this->assertEquals("受注", $rirekiDetail4->getDenku());
        $this->assertEquals(0, $rirekiDetail4->getCkbn());
        $this->assertEquals(2, $rirekiDetail4->getGkbn());
        $this->assertEquals("109", $rirekiDetail4->getMcode());
        $this->assertEquals("", $rirekiDetail4->getMbikou());
        $this->assertEquals(1, $rirekiDetail4->getDenno());
        $this->assertEquals(0, $rirekiDetail4->getGiftno());
        $this->assertEquals(0, $rirekiDetail4->getDenkuNum());
        $this->assertEquals("2024-05-15 00:00:00", $rirekiDetail4->getDay()->toLongDate());
        $this->assertEquals(4, $rirekiDetail4->getLine());
        $this->assertEquals("", $rirekiDetail4->getFcode1());
        $this->assertEquals("", $rirekiDetail4->getFcode2());
        $this->assertEquals("", $rirekiDetail4->getFcode3());
        $this->assertEquals("", $rirekiDetail4->getDbikou1());
        $this->assertEquals("", $rirekiDetail4->getDbikou2());
        $this->assertEquals("", $rirekiDetail4->getDbikou3());
        $this->assertEquals("", $rirekiDetail4->getNbikou1());
        $this->assertEquals("", $rirekiDetail4->getNbikou2());
        $this->assertEquals("", $rirekiDetail4->getObikou1());
        $this->assertEquals("", $rirekiDetail4->getObikou2());
        $this->assertEquals("", $rirekiDetail4->getFmemo1());
        $this->assertEquals("", $rirekiDetail4->getFmemo2());
        $this->assertEquals("", $rirekiDetail4->getFmemo3());
        $this->assertEquals("ECサイト", $rirekiDetail4->getJname());

        $this->assertEquals(0, $mailJyuden1->getMailkbn());
        $this->assertEquals("注文コメント", $mailJyuden1->getTbikou());
        $this->assertEquals("受注返信コメント", $mailJyuden1->getJbikou());
        $this->assertEquals("出荷返信コメント", $mailJyuden1->getSbikou());
        $this->assertEquals("abc@AceClient.v1.0", $mailJyuden1->getMail());

        $this->assertEquals(0, $mailJyuden2->getMailkbn());
        $this->assertEquals("注文コメント", $mailJyuden2->getTbikou());
        $this->assertEquals("受注返信コメント", $mailJyuden2->getJbikou());
        $this->assertEquals("出荷返信コメント", $mailJyuden2->getSbikou());
        $this->assertEquals("abc@AceClient.v1.0", $mailJyuden2->getMail());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }
}