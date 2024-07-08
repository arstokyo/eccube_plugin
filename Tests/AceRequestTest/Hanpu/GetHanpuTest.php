<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Hanpu;

use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu\AddHanpuResponseModel;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\GetHanpu\GetHanpuRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpu\GetHanpuResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetHanpuTest extends AceRequestTestAbtract
{
    private ?string $testMemberId = '221';
    private ?string $testSessid = '5555555555';
    public function getAddHanpuModel(): AddHanpu\AddHanpuRequestModel
    {
        $member = (new AddHanpu\MemberModel)
                        ->setJmember((new AddHanpu\JmemberModel())->setCode($this->testMemberId))
                        ->setSmember((new AddHanpu\SmemberModel())->setCode($this->testMemberId))
                        ->setNmember((new AddHanpu\NmemberModel())->setEda(1));

        $handen = (new AddHanpu\HandenModel)
                        ->setDay((new \Datetime())->modify('+1 year'))
                        ->setTcode("123")
                        ->setSkbn(0)
                        ->setJcode(1)
                        ->setPcode(14)
                        ->setBcode(100)
                        ->setBkcode(100)
                        ->setBumon(100)
                        ->setSouko(1)
                        ->setHcode(10)
                        ->setHtime(2)
                        ->setFcode1('フリーコード1')
                        ->setFcode2('フリーコード2')
                        ->setFcode3('フリーコード3')
                        ->setNbikou1('納品備考1')
                        ->setNbikou2('納品備考2')
                        ->setObikou1('送り状備考1')
                        ->setObikou2('送り状備考2')
                        ->setHbikou1("頒布伝票備考1")
                        ->setHbikou2("頒布伝票備考2")
                        ->setDbikou1('伝票備考1')
                        ->setDbikou2('伝票備考2')
                        ->setDbikou3('伝票備考3')
                        ->setDfmemoh1("伝票フリーメモ1")
                        ->setDfmemoh2("伝票フリーメモ2")
                        ->setDfmemoh3("伝票フリーメモ3")
                        ->setBscode(100)
                        ->setPointm(0)
                        ->setCardInfo((new AddHanpu\CardInfoModel())
                                            ->setCcode(100)
                                            ->setCno('123456789')
                                            ->setCkigen((new \Datetime())->modify('+1 year'))
                                            ->setCpay(21)
                                            ->setKaisuu(5)
                                            ->setSyounin(100)
                                            ->setSpscustomerid("100")
                                            ->setSpstid("100")
                                            ->setVeriorderid(999)
                                            ->setCname('name')
                                            ->setVeristatus(1)
                                            ->setPgtmemid(100)
                                            ->setPgtmemcdid(110)
                                            ->setPgttid(20)
                                            ->setPgtid(999)
                                            ->setPgticls(1)
                                            ->setGmomemberid(100)
                                            ->setGmoorderid('123456789')
                                            ->setGmotorihikiid('gmoid')
                                            ->setGmotorihikipw('gmopw')
                                            ->setGmocardeda(1)
                                    )
                        ->setCampaign(0)
                        ->setHanpucd("21")
                        ->setHanpuFirst((new AddHanpu\HanpuFirstModel())
                                            ->setSday((new \Datetime())->modify('+1 year'))
                                            ->setOtodokeday((new \Datetime())->modify('+3 year'))
                                        )
                        ->setHanpuSecond((new AddHanpu\HanpuSecondModel())
                                            ->setSite(1)
                                            // ->setSiteday(21)
                                            ->setSdd(3)
                                            ->setWeeksite(1)
                                            ->setWeekday(2)
                                            ->setOtodokedd(1)
                                            ->setOtodokewsite(3)
                                            ->setOtodokewday(2)
                                        )
                        ->setWeborderno(1234);
        $mailjyuden = (new AddHanpu\MailJyudenModel())
                        ->setTbikou("メール伝票備考")
                        ->setMail("addHanpuTest@AceClient.v1.0");
        $detail = (new AddHanpu\DetailModel())
                    ->setHanmei([(new AddHanpu\HanmeiModel())
                                    ->setGcode(102)
                                    ->setSuu(7)
                                    ->setTanka(1200)
                                    ->setKousin(1)
                                    ->setKsite(1)
                                    ->setTeiki(1)
                                    ->setTaxkbn(0)
                                ,(new AddHanpu\HanmeiModel())
                                    ->setGcode(100)
                                    ->setSuu(40)
                                    ->setTanka(1650)
                                    ->setKousin(0)
                                    ->setKsite(1)
                                    ->setTeiki(1)
                                    ->setTaxkbn(2)
                                ]);
        $prm = (new AddHanpu\HanpuPrmModel())
                    ->setMember($member)
                    ->setHanden($handen)
                    ->setMailjyuden($mailjyuden)
                    ->setDetail($detail);
        return (new AddHanpu\AddHanpuRequestModel())
                    ->setId(OverviewMapper::ACE_TEST_SYID)
                    ->setSessId($this->testSessid)
                    ->setPrm($prm);
    }

    public function testRequestGetHanpuOK()
    {
        try {
            $addHanpuRequest = $this->getAddHanpuModel();
            $response = $this->aceClient->makeHanpuService()
                                        ->makeAddHanpuMethod()
                                        ->withRequest($addHanpuRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddHanpuResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $handen = $responseObj->getOrder()->getHanden();
                $hanmei1 = $responseObj->getOrder()->getHanmei()[0];
                $hanmei2 = $responseObj->getOrder()->getHanmei()[1];
                $jyusub = $responseObj->getOrder()->getJyusub();
                $jyuden = $responseObj->getOrder()->getJyuden();
                $jyumei1 = $responseObj->getOrder()->getJyumei()[0];
                $jyumei2 = $responseObj->getOrder()->getJyumei()[1];
                $point = $responseObj->getOrder()->getPoint();
                $mailjyuden = $responseObj->getOrder()->getMailjyuden();
                $coupon = $responseObj->getOrder()->getCoupon();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals(13, $handen->getId());
        $this->assertEquals($this->testSessid, $handen->getSessid());
        $this->assertEquals((new \Datetime())->modify('+1 year')->format('Ymd'), $handen->getDay()->toApiDateTime());
        $this->assertEquals(21, $handen->getHanpu());
        $this->assertEquals(0, $handen->getTorikbn());
        $this->assertEquals("100", $handen->getBumon());
        $this->assertEquals("221", $handen->getMcode());
        $this->assertEquals("221", $handen->getScode());
        $this->assertEquals(1, $handen->getJcode());
        $this->assertEquals(14, $handen->getPcode());
        $this->assertEquals("", $handen->getCcode());
        $this->assertEquals("", $handen->getCno());
        $this->assertEquals(null, $handen->getCkigen());
        $this->assertEquals("", $handen->getCname());
        $this->assertEquals(null, $handen->getCpay());
        $this->assertEquals("", $handen->getSyounin());
        $this->assertEquals(null, $handen->getKaisuu());
        $this->assertEquals("100", $handen->getBcode());
        $this->assertEquals("100", $handen->getBkcode());
        $this->assertEquals("フリーコード1", $handen->getFcode1());
        $this->assertEquals("フリーコード2", $handen->getFcode2());
        $this->assertEquals("フリーコード3", $handen->getFcode3());
        $this->assertEquals(10, $handen->getHcode());
        $this->assertEquals("221", $handen->getNcode());
        $this->assertEquals("1", $handen->getNadr());
        $this->assertEquals("1", $handen->getSouko());
        $this->assertEquals("thong", $handen->getTcode());
        $this->assertEquals(1, $handen->getScnt());
        $this->assertEquals(0, $handen->getEcnt());
        $this->assertEquals(1, $handen->getSitekbn());
        $this->assertEquals(1, $handen->getSite());
        $this->assertEquals((new \Datetime())->modify('+1 year')->format('Ymd'), $handen->getDay()->toApiDateTime());
        $this->assertEquals(null, $handen->getEday());
        $this->assertEquals(0, $handen->getYkbn());
        $this->assertEquals(0, $handen->getFinflg());
        $this->assertEquals(null, $handen->getFinday());
        $this->assertEquals("", $handen->getNbikou1());
        $this->assertEquals('納品備考1納品備考2', trim(preg_replace('/\R+/', '',$handen->getNbikou2())));
        $this->assertEquals("", $handen->getObikou1());
        $this->assertEquals('送り状備考1送り状備考2', trim(preg_replace('/\R+/', '',$handen->getObikou2())));
        $this->assertEquals("thong", $handen->getTncode());
        $this->assertEquals(0, $handen->getBunsyo());
        $this->assertEquals(0, $handen->getNouhin());
        $this->assertEquals(2, $handen->getHtime());
        $this->assertEquals(null, $handen->getHday());
        $this->assertEquals("100", $handen->getBcodef());
        $this->assertEquals("100", $handen->getBkcodef());
        $this->assertEquals(0, $handen->getCamflg());
        $this->assertEquals(null, $handen->getSdd());
        $this->assertEquals(1, $handen->getWeeksite());
        $this->assertEquals(2, $handen->getWeekday());
        $this->assertEquals(null, $handen->getHcode2());
        $this->assertEquals('頒布伝票備考1頒布伝票備考2', trim(preg_replace('/\R+/', '',$handen->getHbikou1())));
        $this->assertEquals("", $handen->getHbikou2());
        $this->assertEquals(null, $handen->getPcode2());
        $this->assertEquals(1, $handen->getHtype());
        $this->assertEquals(0, $handen->getGiftfg());
        $this->assertEquals(0, $handen->getUskbn());
        $this->assertEquals(13, $handen->getMemid());
        $this->assertEquals((new \Datetime())->modify('+3 year')->format('Ymd'), $handen->getOtodokeday());
        $this->assertEquals(null, $handen->getOtodokedd());
        $this->assertEquals(null, $handen->getOtodokewsite());
        $this->assertEquals(null, $handen->getOtodokewday());
        $this->assertEquals("", $handen->getSpscustomerid());
        $this->assertEquals("", $handen->getSpstid());
        $this->assertEquals("", $handen->getPgtkid());
        $this->assertEquals("100", $handen->getGmomemberid());
        $this->assertEquals("123456789", $handen->getGmoorderid());
        $this->assertEquals("gmoid", $handen->getGmotorihikiid());
        $this->assertEquals("gmopw", $handen->getGmotorihikipw());
        $this->assertEquals(null, $handen->getSpsstatus());
        $this->assertEquals(null, $handen->getPgtstatus());
        $this->assertEquals(3, $handen->getGmostatus());
        $this->assertEquals(75240, $handen->getTotal());
        $this->assertEquals(null, $handen->getSdate());
        $this->assertEquals(null, $handen->getDbikouh1());
        $this->assertEquals(null, $handen->getDbikouh2());
        $this->assertEquals(null, $handen->getDbikouh3());
        $this->assertEquals("伝票フリーメモ1", $handen->getDfmemoh1());
        $this->assertEquals("伝票フリーメモ2", $handen->getDfmemoh2());
        $this->assertEquals("伝票フリーメモ3", $handen->getDfmemoh3());

        $this->assertEquals(13, $hanmei1->getId());
        $this->assertEquals($this->testSessid, $hanmei1->getSessid());
        $this->assertEquals("1", $hanmei1->getEda());
        $this->assertEquals("102", $hanmei1->getGcode());
        $this->assertEquals(7, $hanmei1->getSuu());
        $this->assertEquals(1200, $hanmei1->getTanka());
        $this->assertEquals(0, $hanmei1->getKousin());
        $this->assertEquals(0, $hanmei1->getCkbn());
        $this->assertEquals(null, $hanmei1->getSdate());
        $this->assertEquals(1, $hanmei1->getKsite());

        $this->assertEquals(13, $hanmei2->getId());
        $this->assertEquals($this->testSessid, $hanmei2->getSessid());
        $this->assertEquals("2", $hanmei2->getEda());
        $this->assertEquals("100", $hanmei2->getGcode());
        $this->assertEquals(40, $hanmei2->getSuu());
        $this->assertEquals(1650, $hanmei2->getTanka());
        $this->assertEquals(0, $hanmei2->getKousin());
        $this->assertEquals(0, $hanmei2->getCkbn());
        $this->assertEquals(null, $hanmei2->getSdate());
        $this->assertEquals(1, $hanmei2->getKsite());

        $this->assertEquals(13, $jyusub->getId());
        $this->assertEquals($this->testSessid, $jyusub->getSessid());
        $this->assertEquals(0, $jyusub->getTorikbn());
        $this->assertEquals(0, $jyusub->getDensyu());
        $this->assertEquals("100", $jyusub->getBumon());
        $this->assertEquals("221", $jyusub->getMcode());
        $this->assertEquals("221", $jyusub->getScode());
        $this->assertEquals(1, $jyusub->getJcode());
        $this->assertEquals(14, $jyusub->getPcode());
        $this->assertEquals("", $jyusub->getCcode());
        $this->assertEquals("", $jyusub->getCno());
        $this->assertEquals(null, $jyusub->getCkigen());
        $this->assertEquals("", $jyusub->getCname());
        $this->assertEquals(null, $jyusub->getCpay());
        $this->assertEquals("", $jyusub->getSyounin());
        $this->assertEquals(null, $jyusub->getKaisuu());
        $this->assertEquals(null, $jyusub->getBun1());
        $this->assertEquals(null, $jyusub->getBun2());
        $this->assertEquals("100", $jyusub->getBcode());
        $this->assertEquals("100", $jyusub->getBkcode());
        $this->assertEquals("", $jyusub->getFcode1());
        $this->assertEquals("フリーコード2", $jyusub->getFcode2());
        $this->assertEquals("", $jyusub->getFcode3());
        $this->assertEquals(0, $jyusub->getSmpkbn());
        $this->assertEquals(0, $jyusub->getPointritu());
        $this->assertEquals(13, $jyusub->getMemid());
        $this->assertEquals("", $jyusub->getSpscustomerid());
        $this->assertEquals("", $jyusub->getSpstid());
        $this->assertEquals("", $jyusub->getPgtkid());
        $this->assertEquals("", $jyusub->getGmomemberid());
        $this->assertEquals("", $jyusub->getGmoorderid());
        $this->assertEquals("", $jyusub->getGmotorihikiid());
        $this->assertEquals("", $jyusub->getGmotorihikipw());
        $this->assertEquals(null, $jyusub->getSpsstatus());
        $this->assertEquals(null, $jyusub->getPgtstatus());
        $this->assertEquals(null, $jyusub->getGmostatus());
        $this->assertEquals(null, $jyusub->getTpdenno());
        $this->assertEquals("", $jyusub->getWeborderno());

        $this->assertEquals(13, $jyuden->getId());
        $this->assertEquals($this->testSessid, $jyuden->getSessid());
        $this->assertEquals(0, $jyuden->getGiftno());
        $this->assertEquals("0", $jyuden->getDenku());
        $this->assertEquals((new \Datetime())->modify('+1 year')->format('Ymd'), $jyuden->getDay()->toApiDateTime());
        $this->assertEquals((new \Datetime())->modify('+1 year')->format('Ymd'), $jyuden->getYday()->toApiDateTime());
        $this->assertEquals(null, $jyuden->getSday());
        $this->assertEquals(null, $jyuden->getUday());
        $this->assertEquals(null, $jyuden->getNday());
        $this->assertEquals((new \Datetime())->modify('+3 year')->format('Ymd'), $jyuden->getHday()->toApiDateTime());
        $this->assertEquals(2, $jyuden->getHtime());
        $this->assertEquals(10, $jyuden->getHcode());
        $this->assertEquals("221", $jyuden->getNcode());
        $this->assertEquals("1", $jyuden->getNadr());
        $this->assertEquals("1", $jyuden->getSouko());
        $this->assertEquals("thong", $jyuden->getTcode());
        $this->assertEquals(0, $jyuden->getBunsyo());
        $this->assertEquals(0, $jyuden->getHrcd());
        $this->assertEquals("", $jyuden->getDbikou1());
        $this->assertEquals("", $jyuden->getDbikou2());
        $this->assertEquals("", $jyuden->getDbikou3());
        $this->assertEquals("", $jyuden->getNbikou1());
        $this->assertEquals("", $jyuden->getNbikou2());
        $this->assertEquals("送り状備考1", $jyuden->getObikou1());
        $this->assertEquals("", $jyuden->getObikou2());
        $this->assertEquals("", $jyuden->getNosi());
        $this->assertEquals(1, $jyuden->getOkurisuu());
        $this->assertEquals("", $jyuden->getOkurino());
        $this->assertEquals("", $jyuden->getFmemo1());
        $this->assertEquals("", $jyuden->getFmemo2());
        $this->assertEquals("", $jyuden->getFmemo3());
        $this->assertEquals(74400, $jyuden->getGtotal());
        $this->assertEquals(0, $jyuden->getSouryou());
        $this->assertEquals(0, $jyuden->getTesuu());
        $this->assertEquals(0, $jyuden->getNebiki());
        $this->assertEquals(8400, $jyuden->getTtotal());
        $this->assertEquals(840, $jyuden->getTax());
        $this->assertEquals(75240, $jyuden->getSyoukei());
        $this->assertEquals(0, $jyuden->getTyousei());
        $this->assertEquals(75240, $jyuden->getTotal());
        $this->assertEquals(0, $jyuden->getNouhin());
        $this->assertEquals(1, $jyuden->getYdaysuu());
        $this->assertEquals("AddHanpuTest", $jyuden->getOkurinusi());
        $this->assertEquals(0, $jyuden->getSkbn());
        $this->assertEquals("thong", $jyuden->getTncode());
        $this->assertEquals(0, $jyuden->getUttotal());
        $this->assertEquals(0, $jyuden->getUtax());
        $this->assertEquals(66000, $jyuden->getHttotal());
        $this->assertEquals(74400, $jyuden->getGtotalzn());
        $this->assertEquals(0, $jyuden->getSouryouzn());
        $this->assertEquals(0, $jyuden->getTesuuzn());
        $this->assertEquals(0, $jyuden->getNebikizn());
        $this->assertEquals(840, $jyuden->getTaxtotal());
        $this->assertEquals(13, $jyuden->getMemid());

        $this->assertEquals(1, $jyumei1->getKbn());
        $this->assertEquals(1, $jyumei1->getLine());
        $this->assertEquals("102", $jyumei1->getGcode());
        $this->assertEquals("商品１０２", $jyumei1->getGname());
        $this->assertEquals("", $jyumei1->getSubname());
        $this->assertEquals(7, $jyumei1->getSuu());
        $this->assertEquals("", $jyumei1->getImage1());
        $this->assertEquals("", $jyumei1->getImage2());
        $this->assertEquals(0, $jyumei1->getTanka1());
        $this->assertEquals(0, $jyumei1->getTanka2());
        $this->assertEquals(0, $jyumei1->getTanka3());
        $this->assertEquals(0, $jyumei1->getTanka4());
        $this->assertEquals(0, $jyumei1->getTanka5());
        $this->assertEquals(0, $jyumei1->getTanka6());
        $this->assertEquals(0, $jyumei1->getTanka7());
        $this->assertEquals(0, $jyumei1->getTanka8());
        $this->assertEquals(0, $jyumei1->getTanka9());
        $this->assertEquals(1200, $jyumei1->getTanka());
        $this->assertEquals(0, $jyumei1->getCkbn());
        $this->assertEquals(0, $jyumei1->getGkbn());
        $this->assertEquals("", $jyumei1->getDetailmsg());

        $this->assertEquals(1, $jyumei2->getKbn());
        $this->assertEquals(2, $jyumei2->getLine());
        $this->assertEquals("100", $jyumei2->getGcode());
        $this->assertEquals("商品100", $jyumei2->getGname());
        $this->assertEquals("商品100", $jyumei2->getSubname());
        $this->assertEquals(40, $jyumei2->getSuu());
        $this->assertEquals("", $jyumei2->getImage1());
        $this->assertEquals("", $jyumei2->getImage2());
        $this->assertEquals(0, $jyumei2->getTanka1());
        $this->assertEquals(0, $jyumei2->getTanka2());
        $this->assertEquals(0, $jyumei2->getTanka3());
        $this->assertEquals(0, $jyumei2->getTanka4());
        $this->assertEquals(0, $jyumei2->getTanka5());
        $this->assertEquals(0, $jyumei2->getTanka6());
        $this->assertEquals(0, $jyumei2->getTanka7());
        $this->assertEquals(0, $jyumei2->getTanka8());
        $this->assertEquals(0, $jyumei2->getTanka9());
        $this->assertEquals(1650, $jyumei2->getTanka());
        $this->assertEquals(0, $jyumei2->getCkbn());
        $this->assertEquals(0, $jyumei2->getGkbn());
        $this->assertEquals("", $jyumei2->getDetailmsg());

        $this->assertEquals(null, $point->getPointM());
        $this->assertEquals(null, $point->getPointP());

        $this->assertEquals(null, $coupon);

        $this->assertEquals('メール伝票備考', $mailjyuden->getTbikou());
        $this->assertEquals('addHanpuTest@AceClient.v1.0', $mailjyuden->getMail());

        $this->assertEquals("", $message1);
        $this->assertEquals("", $message2);

    }
    public function testRequestGetHanpuNG()
    {
        try {
            $addHanpuRequest = $this->getAddHanpuModel()->setId(-1);
            $response = $this->aceClient->makeHanpuService()
                                        ->makeAddHanpuMethod()
                                        ->withRequest($addHanpuRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddHanpuResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals("システムＩＤ設定がありません", $message1);
    }

    public function testSerializeGetHanpu()
    {
        $getHanpuRequestModel = $this->GetHanpuRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getHanpuRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHanpu xmlns="{$xmlns}">
                <id>13</id>
                <sessId>2121</sessId>
            </getHanpu>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function GetHanpuRequestForSerialize(): GetHanpuRequestModel
    {
        $hanpu = new GetHanpuRequestModel();
        $getHanpu = $hanpu->setId(OverviewMapper::ACE_TEST_SYID)
                          ->setSessId("2121");
        return $getHanpu;
    }
}
