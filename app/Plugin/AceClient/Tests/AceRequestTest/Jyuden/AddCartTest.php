<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class AddCartTest extends AceRequestTestAbtract
{
    private ?string $testMemberId = '112';
    private ?string $testSessid = '112';
    public function getAddCartModel(): AddCart\AddCartRequestModel
    {
        $member = (new AddCart\MemberOrderModel)
                        ->setJmember((new AddCart\JmemberModel())->setCode($this->testMemberId))
                        ->setSmember((new AddCart\SmemberModel())->setCode($this->testMemberId))
                        ->setNmember((new AddCart\NmemberModel())->setEda(1));

        $jyuden = (new AddCart\JyudenModel())
                       ->setTorikbn(1)
                       ->setDay(new \Datetime())
                       ->setTcode('123')
                       ->setSkbn(0)
                       ->setJcode(1)
                       ->setPcode(14)
                       ->setBcode(100)
                       ->setBkcode(100)
                       ->setBumon(100)
                       ->setSouko(1)
                       ->setHcode(10)
                       ->setHday((new \Datetime())->modify('+14 day'))
                       ->setHtime(2)
                       ->setBunsyo(1)
                       ->setObikou1('送り状備考1')
                       ->setObikou2('送り状備考2')
                       ->setNosi('のし')
                       ->setDbikou1('伝票備考1')
                       ->setDbikou2('伝票備考2')
                       ->setDbikou3('伝票備考3')
                       ->setNbikou1('納品備考1')
                       ->setNbikou2('納品備考2')
                       ->setFcode1('フリーコード1')
                       ->setFcode2('フリーコード2')
                       ->setFcode3('フリーコード3')
                       ->setFmemo1('フリーメモ1')
                       ->setFmemo2('フリーメモ2')
                       ->setFmemo3('フリーメモ3')
                       ->setPointm(0)
                       ->setWeborderno(1000)
                       ->setCampaign(0)
                       ->setSouryou(1000)
                       ->setNebiki(500)
                       ->setTesuu(700)
                       ->setPointm(100)
                       ->setCvsInfo((new AddCart\CvsInfoModel())
                                        ->setServiceoptiontype('sej')
                                        ->setOrderid('123456789')
                                        ->setAmount(1000)
                                        ->setName1('name1')
                                        ->setName2('name2')
                                        ->setTel('123456789')
                                        ->setPaylimit((new \DateTime())->modify('+25 day'))
                                        ->setMstatus('success')
                                        ->setVresultcode('success')
                                        ->setReceiptno('123456789')
                                )
                        ->setCardInfo((new AddCart\CardInfoModel())
                                        ->setCcode(100)
                                        ->setCno('123456789')
                                        ->setCkigen((new \DateTime())->modify('+1 year'))
                                        ->setCpay(21)
                                        ->setKaisuu(5)
                                        ->setSyounin(100)
                                        ->setSpscustomerid(100)
                                        ->setSpstid(999)
                                        ->setVeriorderid('999999999')
                                        ->setCname('name')
                                        ->setVeristatus(1)
                                        ->setInkokyakuid(OverviewMapper::ACE_TEST_SYID)
                                        ->setInchumonid('123456789')
                                        ->setIntokushu1(100)
                                        ->setIntokushu2(1)
                                        ->setUkeno(1)
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
                        ->setDpsInfo((new AddCart\DpsInfoModel())
                                        ->setGmodpsorderid('123456789')
                                        ->setGmodpstid(1)
                        );

        $detail = (new AddCart\DetailModel())
                       ->setJyumei([(new AddCart\JyumeiModel())
                                                    ->setGcode(100)
                                                    ->setSuu(10)
                                                    ->setTanka(1000)
                                                    ->setIgnorezaiko(1)
                                                    ->setChoseizaiko(1)
                                                    ->setMbikou('明細備考No.1')
                                                    ->setTeika(1100)
                                                    ->setRitu(1.5)
                                                    ->setTaxkbn(0)
                                                    ->setMoney(10000)
                                                    ->setGenka(1000)
                                    ,(new AddCart\JyumeiModel())
                                                    ->setGcode(101)
                                                    ->setSuu(5)
                                                    ->setTanka(1200)
                                                    ->setIgnorezaiko(0)
                                                    ->setChoseizaiko(0)
                                                    ->setMbikou('明細備考No.2')
                                                    ->setTeika(1500)
                                                    ->setRitu(1.5)
                                                    ->setTaxkbn(1)
                                                    ->setMoney(7500)
                                                    ->setGenka(1100)
                                    ,(new AddCart\JyumeiModel())
                                                    ->setGcode(102)
                                                    ->setSuu(7)
                                                    ->setTanka(1300)
                                                    ->setIgnorezaiko(1)
                                                    ->setChoseizaiko(0)
                                                    ->setMbikou('明細備考No.3')
                                                    ->setTeika(1400)
                                                    ->setRitu(1.9)
                                                    ->setTaxkbn(2)
                                                    ->setMoney(9800)
                                                    ->setGenka(1200)]);

        $prm = (new AddCart\OrderPrmModel())
                    ->setMember($member)
                    ->setJyuden($jyuden)
                    ->setDetail($detail)
                    ->setDetail($detail)
                    ->setMailjyuden((new AddCart\MailJyudenModel())
                                        ->setMail('addCartTest@AceClient.v1.0')
                                        ->setTbikou('メール伝票備考')
                );

        return (new AddCart\AddCartRequestModel())
                    ->setId(OverviewMapper::ACE_TEST_SYID)
                    ->setSessId($this->testSessid)
                    ->setPrm($prm);
    }

    public function testRequestAddCartOK()
    {
        try {
            $addCartRequest = $this->getAddCartModel();
            $addCartRequest->getPrm()->getJyuden()->setTorikbn(null)->setPointm(null);
            $response = $this->aceClient->makeJyudenService()
                                        ->makeAddCartMethod()
                                        ->withRequest($addCartRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();

                $jyusub = $responseObj->getOrder()->getJyusub();
                $jyuden = $responseObj->getOrder()->getJyuden();
                $jyumei1 = $responseObj->getOrder()->getJyumei()[0];
                $jyumei2 = $responseObj->getOrder()->getJyumei()[1];
                $jyumei3 = $responseObj->getOrder()->getJyumei()[2];
                $jyumei4 = $responseObj->getOrder()->getJyumei()[3];
                $jyumei5 = $responseObj->getOrder()->getJyumei()[4];
                $jyumei6 = $responseObj->getOrder()->getJyumei()[5];
                $point = $responseObj->getOrder()->getPoint();
                $mailjyuden = $responseObj->getOrder()->getMailjyuden();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        
        $this->assertSame(OverviewMapper::ACE_TEST_SYID, $jyusub->getId());
        $this->assertEquals($this->testSessid, $jyusub->getSessid());
        $this->assertEquals(0, $jyusub->getTorikbn());
        $this->assertEquals(0, $jyusub->getDensyu());
        $this->assertEquals(100, $jyusub->getBumon());
        $this->assertEquals($this->testMemberId, $jyusub->getMcode());
        $this->assertEquals($this->testMemberId, $jyusub->getScode());
        $this->assertEquals(1, $jyusub->getJcode());
        $this->assertEquals(14, $jyusub->getPcode());
        $this->assertEquals(null, $jyusub->getCcode());
        $this->assertEquals(null, $jyusub->getCno());
        $this->assertEquals(null, $jyusub->getCkigen());
        $this->assertEquals(null, $jyusub->getCname());
        $this->assertEquals(null, $jyusub->getCpay());
        $this->assertEquals(null, $jyusub->getSyounin());
        $this->assertEquals(null, $jyusub->getKaisuu());
        $this->assertEquals(null, $jyusub->getBun1());
        $this->assertEquals(null, $jyusub->getBun2());
        $this->assertEquals(100, $jyusub->getBcode());
        $this->assertEquals(100, $jyusub->getBkcode());
        $this->assertEquals(null, $jyusub->getFcode1());
        $this->assertEquals('フリーコード2', $jyusub->getFcode2());
        $this->assertEquals(null, $jyusub->getFcode3());
        $this->assertEquals(0, $jyusub->getSmpkbn());
        $this->assertEquals(0, $jyusub->getPointritu());
        $this->assertEquals(13, $jyusub->getMemid());
        $this->assertEquals(null, $jyusub->getSpscustomerid());
        $this->assertEquals(null, $jyusub->getSpstid());
        $this->assertEquals(null, $jyusub->getPgtkid());
        $this->assertEquals(100, $jyusub->getGmomemberid());
        $this->assertEquals('123456789', $jyusub->getGmoorderid());
        $this->assertEquals('gmoid', $jyusub->getGmotorihikiid());
        $this->assertEquals('gmopw', $jyusub->getGmotorihikipw());
        $this->assertEquals(null, $jyusub->getSpsstatus());
        $this->assertEquals(null, $jyusub->getPgtstatus());
        $this->assertEquals(3, $jyusub->getGmostatus());
        $this->assertEquals(null, $jyusub->getVeriorderid());
        $this->assertEquals(null, $jyusub->getVeristatus());
        $this->assertEquals(null, $jyusub->getTpdenno());
        $this->assertEquals(null, $jyusub->getWeborderno());
        $this->assertEquals(99999999, $jyusub->getPointmax());
        $this->assertEquals(null, $jyusub->getGmodpsorderid());
        $this->assertEquals(null, $jyusub->getGmodpstid());

        $this->assertSame(OverviewMapper::ACE_TEST_SYID, $jyuden->getId());
        $this->assertEquals($this->testSessid, $jyuden->getSessid());
        $this->assertEquals(0, $jyuden->getGiftno());
        $this->assertEquals(0, $jyuden->getDenku());
        $this->assertEquals((new \DateTime())->format('Ymd'), $jyuden->getDay()->toApiDateTime());
        $this->assertEquals((new \DateTime())->format('Ymd'), $jyuden->getYday()->toApiDateTime());
        $this->assertEquals(null, $jyuden->getSday());
        $this->assertEquals(null, $jyuden->getUday());
        $this->assertEquals(null, $jyuden->getNday());
        $this->assertEquals((new \DateTime())->modify('+14 day')->format('Ymd'), $jyuden->getHday()->toApiDateTime());
        $this->assertEquals(2, $jyuden->getHtime());
        $this->assertEquals(10, $jyuden->getHcode());
        $this->assertEquals($this->testMemberId, $jyuden->getNcode());
        $this->assertEquals(1, $jyuden->getNadr());
        $this->assertEquals(1, $jyuden->getSouko());
        $this->assertEquals('thong', $jyuden->getTcode());
        $this->assertEquals(1, $jyuden->getBunsyo());
        $this->assertEquals(0, $jyuden->getHrcd());
        $this->assertEquals(null, $jyuden->getDbikou1());
        $this->assertEquals(null, $jyuden->getDbikou2());
        $this->assertEquals(null, $jyuden->getDbikou3());
        $this->assertEquals(null, $jyuden->getNbikou1());
        $this->assertEquals(null, $jyuden->getNbikou2());
        $this->assertEquals('送り状備考1', $jyuden->getObikou1());
        $this->assertEquals(null, $jyuden->getObikou2());
        $this->assertEquals(null, $jyuden->getNosi());
        $this->assertEquals(1, $jyuden->getOkurisuu());
        $this->assertEquals(null, $jyuden->getOkurino());
        $this->assertEquals(null, $jyuden->getFmemo1());
        $this->assertEquals(null, $jyuden->getFmemo2());
        $this->assertEquals(null, $jyuden->getFmemo3());
        $this->assertEquals(68710, $jyuden->getGtotal());
        $this->assertEquals(1000, $jyuden->getSouryou());
        $this->assertEquals(700, $jyuden->getTesuu());
        $this->assertEquals(500, $jyuden->getNebiki());
        $this->assertEquals(20460, $jyuden->getTtotal());
        $this->assertEquals(2040, $jyuden->getTax());
        $this->assertEquals(72950, $jyuden->getSyoukei());
        $this->assertEquals(0, $jyuden->getTyousei());
        $this->assertEquals(72950, $jyuden->getTotal());
        $this->assertEquals(0, $jyuden->getNouhin());
        $this->assertEquals(1, $jyuden->getYdaysuu());
        $this->assertEquals('AddCartTest', $jyuden->getOkurinusi());
        $this->assertEquals(0, $jyuden->getSkbn());
        $this->assertEquals('thong', $jyuden->getTncode());
        $this->assertEquals(17200, $jyuden->getUttotal());
        $this->assertEquals(1558, $jyuden->getUtax());
        $this->assertEquals(33250, $jyuden->getHttotal());
        $this->assertEquals(67350, $jyuden->getGtotalzn());
        $this->assertEquals(910, $jyuden->getSouryouzn());
        $this->assertEquals(637, $jyuden->getTesuuzn());
        $this->assertEquals(455, $jyuden->getNebikizn());
        $this->assertEquals(3598, $jyuden->getTaxtotal());
        $this->assertSame(OverviewMapper::ACE_TEST_SYID, $jyuden->getMemid());

        $this->assertEquals(1, $jyumei1->getKbn());
        $this->assertEquals(1, $jyumei1->getLine());
        $this->assertEquals(100, $jyumei1->getGcode());
        $this->assertEquals('商品100', $jyumei1->getGname());
        $this->assertEquals('商品100', $jyumei1->getSubname());
        $this->assertEquals(10, $jyumei1->getSuu());
        $this->assertEquals('', $jyumei1->getImage1());
        $this->assertEquals('', $jyumei1->getImage2());
        $this->assertEquals(0, $jyumei1->getTanka1());
        $this->assertEquals(0, $jyumei1->getTanka2());
        $this->assertEquals(0, $jyumei1->getTanka3());
        $this->assertEquals(0, $jyumei1->getTanka4());
        $this->assertEquals(0, $jyumei1->getTanka5());
        $this->assertEquals(0, $jyumei1->getTanka6());
        $this->assertEquals(0, $jyumei1->getTanka7());
        $this->assertEquals(0, $jyumei1->getTanka8());
        $this->assertEquals(0, $jyumei1->getTanka9());
        $this->assertEquals(2046, $jyumei1->getTanka());
        $this->assertEquals(0, $jyumei1->getTaxkbn());
        $this->assertEquals(1, $jyumei1->getIgnorezaiko());
        $this->assertEquals(0, $jyumei1->getCkbn());
        $this->assertEquals(0, $jyumei1->getGkbn());
        $this->assertEquals('', $jyumei1->getDetailmsg());
        $this->assertEquals(null, $jyumei1->getMbikou());
        $this->assertEquals(2250, $jyumei1->getTintanka());
        $this->assertEquals(2046, $jyumei1->getTouttanka());
        $this->assertEquals(204, $jyumei1->getTaxtanka());
        $this->assertEquals(22500, $jyumei1->getTinmoney());
        $this->assertEquals(20460, $jyumei1->getToutmoney());
        $this->assertEquals(2040, $jyumei1->getTaxmoney());

        $this->assertEquals(2, $jyumei2->getKbn());
        $this->assertEquals(2, $jyumei2->getLine());
        $this->assertEquals(101, $jyumei2->getGcode());
        $this->assertEquals('商品101', $jyumei2->getGname());
        $this->assertEquals('商品101', $jyumei2->getSubname());
        $this->assertEquals(5, $jyumei2->getSuu());
        $this->assertEquals('', $jyumei2->getImage1());
        $this->assertEquals('', $jyumei2->getImage2());
        $this->assertEquals(0, $jyumei2->getTanka1());
        $this->assertEquals(0, $jyumei2->getTanka2());
        $this->assertEquals(0, $jyumei2->getTanka3());
        $this->assertEquals(0, $jyumei2->getTanka4());
        $this->assertEquals(0, $jyumei2->getTanka5());
        $this->assertEquals(0, $jyumei2->getTanka6());
        $this->assertEquals(0, $jyumei2->getTanka7());
        $this->assertEquals(0, $jyumei2->getTanka8());
        $this->assertEquals(0, $jyumei2->getTanka9());
        $this->assertEquals(3000, $jyumei2->getTanka());
        $this->assertEquals(1, $jyumei2->getTaxkbn());
        $this->assertEquals(0, $jyumei2->getIgnorezaiko());
        $this->assertEquals(0, $jyumei2->getCkbn());
        $this->assertEquals(0, $jyumei2->getGkbn());
        $this->assertEquals('', $jyumei2->getDetailmsg());
        $this->assertEquals(null, $jyumei2->getMbikou());
        $this->assertEquals(3000, $jyumei2->getTintanka());
        $this->assertEquals(2728, $jyumei2->getTouttanka());
        $this->assertEquals(272, $jyumei2->getTaxtanka());
        $this->assertEquals(15000, $jyumei2->getTinmoney());
        $this->assertEquals(13640, $jyumei2->getToutmoney());
        $this->assertEquals(1360, $jyumei2->getTaxmoney());

        $this->assertEquals(1, $jyumei3->getKbn());
        $this->assertEquals(3, $jyumei3->getLine());
        $this->assertEquals(102, $jyumei3->getGcode());
        $this->assertEquals('商品１０２', $jyumei3->getGname());
        $this->assertEquals('', $jyumei3->getSubname());
        $this->assertEquals(7, $jyumei3->getSuu());
        $this->assertEquals('', $jyumei3->getImage1());
        $this->assertEquals('', $jyumei3->getImage2());
        $this->assertEquals(0, $jyumei3->getTanka1());
        $this->assertEquals(0, $jyumei3->getTanka2());
        $this->assertEquals(0, $jyumei3->getTanka3());
        $this->assertEquals(0, $jyumei3->getTanka4());
        $this->assertEquals(0, $jyumei3->getTanka5());
        $this->assertEquals(0, $jyumei3->getTanka6());
        $this->assertEquals(0, $jyumei3->getTanka7());
        $this->assertEquals(0, $jyumei3->getTanka8());
        $this->assertEquals(0, $jyumei3->getTanka9());
        $this->assertEquals(4750, $jyumei3->getTanka());
        $this->assertEquals(2, $jyumei3->getTaxkbn());
        $this->assertEquals(1, $jyumei3->getIgnorezaiko());
        $this->assertEquals(0, $jyumei3->getCkbn());
        $this->assertEquals(0, $jyumei3->getGkbn());
        $this->assertEquals('', $jyumei3->getDetailmsg());
        $this->assertEquals(null, $jyumei3->getMbikou());
        $this->assertEquals(4750, $jyumei3->getTintanka());
        $this->assertEquals(4750, $jyumei3->getTouttanka());
        $this->assertEquals(0, $jyumei3->getTaxtanka());
        $this->assertEquals(33250, $jyumei3->getTinmoney());
        $this->assertEquals(33250, $jyumei3->getToutmoney());
        $this->assertEquals(0, $jyumei3->getTaxmoney());

        $this->assertEquals(1, $jyumei4->getKbn());
        $this->assertEquals(4, $jyumei4->getLine());
        $this->assertEquals('s-1', $jyumei4->getGcode());
        $this->assertEquals('送料1', $jyumei4->getGname());
        $this->assertEquals('送料1', $jyumei4->getSubname());
        $this->assertEquals(1, $jyumei4->getSuu());
        $this->assertEquals('', $jyumei4->getImage1());
        $this->assertEquals('', $jyumei4->getImage2());
        $this->assertEquals(0, $jyumei4->getTanka1());
        $this->assertEquals(0, $jyumei4->getTanka2());
        $this->assertEquals(0, $jyumei4->getTanka3());
        $this->assertEquals(0, $jyumei4->getTanka4());
        $this->assertEquals(0, $jyumei4->getTanka5());
        $this->assertEquals(0, $jyumei4->getTanka6());
        $this->assertEquals(0, $jyumei4->getTanka7());
        $this->assertEquals(0, $jyumei4->getTanka8());
        $this->assertEquals(0, $jyumei4->getTanka9());
        $this->assertEquals(1000, $jyumei4->getTanka());
        $this->assertEquals(1, $jyumei4->getTaxkbn());
        $this->assertEquals(1, $jyumei4->getIgnorezaiko());
        $this->assertEquals(0, $jyumei4->getCkbn());
        $this->assertEquals(1, $jyumei4->getGkbn());
        $this->assertEquals('', $jyumei4->getDetailmsg());
        $this->assertEquals(null, $jyumei4->getMbikou());
        $this->assertEquals(1000, $jyumei4->getTintanka());
        $this->assertEquals(910, $jyumei4->getTouttanka());
        $this->assertEquals(90, $jyumei4->getTaxtanka());
        $this->assertEquals(1000, $jyumei4->getTinmoney());
        $this->assertEquals(910, $jyumei4->getToutmoney());
        $this->assertEquals(90, $jyumei4->getTaxmoney());

        $this->assertEquals(1, $jyumei5->getKbn());
        $this->assertEquals(5, $jyumei5->getLine());
        $this->assertEquals('d-1', $jyumei5->getGcode());
        $this->assertEquals('代引き手数料1', $jyumei5->getGname());
        $this->assertEquals('代引き手数料1', $jyumei5->getSubname());
        $this->assertEquals(1, $jyumei5->getSuu());
        $this->assertEquals('', $jyumei5->getImage1());
        $this->assertEquals('', $jyumei5->getImage2());
        $this->assertEquals(0, $jyumei5->getTanka1());
        $this->assertEquals(0, $jyumei5->getTanka2());
        $this->assertEquals(0, $jyumei5->getTanka3());
        $this->assertEquals(0, $jyumei5->getTanka4());
        $this->assertEquals(0, $jyumei5->getTanka5());
        $this->assertEquals(0, $jyumei5->getTanka6());
        $this->assertEquals(0, $jyumei5->getTanka7());
        $this->assertEquals(0, $jyumei5->getTanka8());
        $this->assertEquals(0, $jyumei5->getTanka9());
        $this->assertEquals(700, $jyumei5->getTanka());
        $this->assertEquals(1, $jyumei5->getTaxkbn());
        $this->assertEquals(1, $jyumei5->getIgnorezaiko());
        $this->assertEquals(0, $jyumei5->getCkbn());
        $this->assertEquals(2, $jyumei5->getGkbn());
        $this->assertEquals('', $jyumei5->getDetailmsg());
        $this->assertEquals(null, $jyumei5->getMbikou());
        $this->assertEquals(700, $jyumei5->getTintanka());
        $this->assertEquals(637, $jyumei5->getTouttanka());
        $this->assertEquals(63, $jyumei5->getTaxtanka());
        $this->assertEquals(700, $jyumei5->getTinmoney());
        $this->assertEquals(637, $jyumei5->getToutmoney());
        $this->assertEquals(63, $jyumei5->getTaxmoney());

        $this->assertEquals(1, $jyumei6->getKbn());
        $this->assertEquals(6, $jyumei6->getLine());
        $this->assertEquals('n-1', $jyumei6->getGcode());
        $this->assertEquals('値引き', $jyumei6->getGname());
        $this->assertEquals('値引き', $jyumei6->getSubname());
        $this->assertEquals(1, $jyumei6->getSuu());
        $this->assertEquals('', $jyumei6->getImage1());
        $this->assertEquals('', $jyumei6->getImage2());
        $this->assertEquals(0, $jyumei6->getTanka1());
        $this->assertEquals(0, $jyumei6->getTanka2());
        $this->assertEquals(0, $jyumei6->getTanka3());
        $this->assertEquals(0, $jyumei6->getTanka4());
        $this->assertEquals(0, $jyumei6->getTanka5());
        $this->assertEquals(0, $jyumei6->getTanka6());
        $this->assertEquals(0, $jyumei6->getTanka7());
        $this->assertEquals(0, $jyumei6->getTanka8());
        $this->assertEquals(0, $jyumei6->getTanka9());
        $this->assertEquals(500, $jyumei6->getTanka());
        $this->assertEquals(1, $jyumei6->getTaxkbn());
        $this->assertEquals(1, $jyumei6->getIgnorezaiko());
        $this->assertEquals(0, $jyumei6->getCkbn());
        $this->assertEquals(3, $jyumei6->getGkbn());
        $this->assertEquals('', $jyumei6->getDetailmsg());
        $this->assertEquals(null, $jyumei6->getMbikou());
        $this->assertEquals(500, $jyumei6->getTintanka());
        $this->assertEquals(455, $jyumei6->getTouttanka());
        $this->assertEquals(45, $jyumei6->getTaxtanka());
        $this->assertEquals(500, $jyumei6->getTinmoney());
        $this->assertEquals(455, $jyumei6->getToutmoney());
        $this->assertEquals(45, $jyumei6->getTaxmoney());

        $this->assertEquals(null, $point->getPointm());
        $this->assertEquals(null, $point->getPointp());
        $this->assertEquals('99999999', $point->getPointmax());

        $this->assertEquals('メール伝票備考', $mailjyuden->getTbikou());
        $this->assertEquals('addCartTest@AceClient.v1.0', $mailjyuden->getMail());

        $this->assertEquals(null, $message1);
        $this->assertEquals(null, $message2);

    }

    public function testSerializeAddCart()
    {
        $requestModel = $this->getAddCartModel();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($requestModel);

        $day = (new \Datetime())->format('Ymd');
        $hday = (new \Datetime())->modify('+14 day')->format('Ymd');
        $paylimit = (new \Datetime())->modify('+25 day')->format('Y/m/d');
        $ckigen = (new \Datetime())->modify('+1 year')->format('Ym');

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;

        $expectedData =
        <<<XML
        {$soapHead}
            <addCart xmlns="{$xmlns}">
                <prm><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
                    <order>
                        <member>
                            <jmember>
                                <code>112</code>    
                            </jmember>
                            <nmember>
                                <eda>1</eda>
                            </nmember>
                            <smember>
                                <code>112</code>
                            </smember>
                        </member>
                        <jyuden>
                            <card_info>
                                <in_kokyaku_id>13</in_kokyaku_id>
                                <in_chumon_id>123456789</in_chumon_id>
                                <in_tokushu1>100</in_tokushu1>
                                <in_tokushu2>1</in_tokushu2>
                                <uke_no>1</uke_no>
                                <pgt_memid>100</pgt_memid>
                                <pgt_memcdid>110</pgt_memcdid>
                                <pgt_tid>20</pgt_tid>
                                <pgt_id>999</pgt_id>
                                <pgt_icls>1</pgt_icls>
                                <gmocardeda>1</gmocardeda>
                                <sps_memid>100</sps_memid>
                                <sps_tracid>999</sps_tracid>
                                <veristatus>1</veristatus>
                                <orderid>999999999</orderid>
                                <card_code>100</card_code>
                                <card_no>123456789</card_no>
                                <card_kigen>{$ckigen}</card_kigen>
                                <card_pay>21</card_pay>
                                <kaisuu>5</kaisuu>
                                <card_syonin>100</card_syonin>
                                <cname>name</cname>
                                <gmomemberid>100</gmomemberid>
                                <gmoorderid>123456789</gmoorderid>
                                <gmotorihikiid>gmoid</gmotorihikiid>
                                <gmotorihikipw>gmopw</gmotorihikipw>
                            </card_info>
                            <cvs_info>
                                <serviceoptiontype>sej</serviceoptiontype>
                                <amount>1000</amount>
                                <name1>name1</name1>
                                <name2>name2</name2>
                                <paylimit>{$paylimit}</paylimit>
                                <mstatus>success</mstatus>
                                <vresultcode>success</vresultcode>
                                <receiptno>123456789</receiptno>
                                <orderid>123456789</orderid>
                                <telno>123456789</telno>
                            </cvs_info>
                            <dps_info>
                                <gmodps_orderid>123456789</gmodps_orderid>
                                <gmodps_tid>1</gmodps_tid>
                            </dps_info>
                            <souko>1</souko>
                            <tcode>123</tcode>
                            <hcode>10</hcode>
                            <htime>2</htime>
                            <nosi>のし</nosi>
                            <bunsyo>1</bunsyo>
                            <hday>{$hday}</hday>
                            <nbikou1>納品備考1</nbikou1>
                            <nbikou2>納品備考2</nbikou2>
                            <obikou1>送り状備考1</obikou1>
                            <obikou2>送り状備考2</obikou2>
                            <dbikou1>伝票備考1</dbikou1>
                            <dbikou2>伝票備考2</dbikou2>
                            <dbikou3>伝票備考3</dbikou3>
                            <fmemo1>フリーメモ1</fmemo1>
                            <fmemo2>フリーメモ2</fmemo2>
                            <fmemo3>フリーメモ3</fmemo3>
                            <souryou>1000</souryou>
                            <nebiki>500</nebiki>
                            <tesuu>700</tesuu>
                            <skbn>0</skbn>
                            <torikbn>1</torikbn>
                            <jcode>1</jcode>
                            <weborderno>1000</weborderno>
                            <day>{$day}</day>
                            <pcode>14</pcode>
                            <bcode>100</bcode>
                            <bkcode>100</bkcode>
                            <bumon>100</bumon>
                            <fcode1>フリーコード1</fcode1>
                            <fcode2>フリーコード2</fcode2>
                            <fcode3>フリーコード3</fcode3>
                            <pointm>100</pointm>
                            <campaign>0</campaign>
                        </jyuden>
                        <detail>
                            <jyumei>
                                <suu>10</suu>
                                <tanka>1000</tanka>
                                <money>10000</money>
                                <mbikou>明細備考No.1</mbikou>
                                <gcode>100</gcode>
                                <ignore_zaiko>1</ignore_zaiko>
                                <chosei_zaiko>1</chosei_zaiko>
                                <taxkbn>0</taxkbn>
                                <teika>1100</teika>
                                <ritu>1.5</ritu>
                                <genka>1000</genka>
                            </jyumei>
                                <jyumei>
                                <suu>5</suu>
                                <tanka>1200</tanka>
                                <money>7500</money>
                                <mbikou>明細備考No.2</mbikou>
                                <gcode>101</gcode>
                                <ignore_zaiko>0</ignore_zaiko>
                                <chosei_zaiko>0</chosei_zaiko>
                                <taxkbn>1</taxkbn>
                                <teika>1500</teika>
                                <ritu>1.5</ritu>
                                <genka>1100</genka>
                            </jyumei>
                            <jyumei>
                                <suu>7</suu>
                                <tanka>1300</tanka>
                                <money>9800</money>
                                <mbikou>明細備考No.3</mbikou>
                                <gcode>102</gcode>
                                <ignore_zaiko>1</ignore_zaiko>
                                <chosei_zaiko>0</chosei_zaiko>
                                <taxkbn>2</taxkbn>
                                <teika>1400</teika>
                                <ritu>1.9</ritu>
                                <genka>1200</genka>
                            </jyumei>
                        </detail>
                        <mailjyuden>
                            <tbikou>メール伝票備考</tbikou>
                            <mail>addCartTest@AceClient.v1.0</mail>
                        </mailjyuden>
                    </order>
                    ]]></prm>
                <id>13</id>
                <sessId>112</sessId>
            </addCart>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }

    public function testRequestAddCartNG()
    {
        try {
            $addCartRequest = $this->getAddCartModel();
            $response = $this->aceClient->makeJyudenService()
                                        ->makeAddCartMethod()
                                        ->withRequest($addCartRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        $this->assertEquals('この決済種別は掛売取引では使用できません。', $message1);
    }


}