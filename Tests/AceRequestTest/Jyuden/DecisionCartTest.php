<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\DecisionCart;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModel;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\DecisionCart\DecisionCartResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Utils\Mapper\OverviewMapper;

class DecisionCartTest extends AbstractAdminWebTestCase
{
    private ?string $testMemberId = '114';
    private ?string $testSessid = '114';
    public function getAddCartModel(int $sessid): AddCart\AddCartRequestModel
    {
        $member = (new AddCart\MemberOrderModel)
                        ->setJmember((new AddCart\JmemberModel())->setCode($this->testMemberId))
                        ->setSmember((new AddCart\SmemberModel())->setCode($this->testMemberId))
                        ->setNmember((new AddCart\NmemberModel())->setEda(1));

        $jyuden = (new AddCart\JyudenModel())
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
                       ->setNosi('1')
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
                       ->setWeborderno(1000114)
                       ->setCampaign(0)
                       ->setSouryou(1000)
                       ->setNebiki(500)
                       ->setTesuu(700)
                       ->setPointm(0)
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
                                                    ->setTanka(1100)
                                                    ->setIgnorezaiko(1)
                                                    ->setChoseizaiko(1)
                                                    ->setMbikou('明細備考No.1')
                                                    ->setTeika(1200)
                                                    ->setRitu(0)
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
                                                    ->setRitu(0)
                                                    ->setTaxkbn(1)
                                                    ->setMoney(7500)
                                                    ->setGenka(1100)
                                    ,(new AddCart\JyumeiModel())
                                                    ->setGcode(102)
                                                    ->setSuu(7)
                                                    ->setTanka(1)
                                                    ->setIgnorezaiko(1)
                                                    ->setChoseizaiko(0)
                                                    ->setMbikou('明細備考No.3')
                                                    ->setTeika(1400)
                                                    ->setRitu(0)
                                                    ->setTaxkbn(2)
                                                    ->setMoney(9800)
                                                    ->setGenka(1200)]);

        $prm = (new AddCart\OrderPrmModel())
                    ->setMember($member)
                    ->setJyuden($jyuden)
                    ->setDetail($detail)
                    ->setMailjyuden((new AddCart\MailJyudenModel())
                                        ->setMail('decisionCart@AceClient.v1.0')
                                        ->setTbikou('メール伝票備考')
                );

        return (new AddCart\AddCartRequestModel())
                    ->setId(OverviewMapper::ACE_TEST_SYID)
                    ->setSessId($sessid)
                    ->setPrm($prm);
    }

    public function addNewCart(int $sessid) : bool
    {
        try {
            $addCartRequest = $this->getAddCartModel($sessid);
            $response = (new AceClient)->makeJyudenService()
                                       ->makeAddCartMethod()
                                       ->withRequest($addCartRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
      return empty($message1) && empty($message2) ;
    }

    public function testRequestDecisionCartOK()
    {
        $this->assertTrue($this->addNewCart($this->testSessid));
        
        try {
            $decisionCartRequest = (new DecisionCart\DecisionCartRequestModel())
                                        ->setId(OverviewMapper::ACE_TEST_SYID)
                                        ->setSessId($this->testSessid);
            $response = (new AceClient)->makeJyudenService()
                                       ->makeDecisionCartMethod()
                                       ->withRequest($decisionCartRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var DecisionCartResponseModel $responseObj */
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
        } catch (ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch (\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEmpty($message1);
        $this->assertEmpty($message2);

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyusub->getId());
        $this->assertNotNull($jyusub->getDenno());
        $this->assertEquals('0', $jyusub->getTorikbn());
        $this->assertEquals('0', $jyusub->getDensyu());
        $this->assertEquals('100', $jyusub->getBumon());
        $this->assertEquals($this->testMemberId, $jyusub->getMcode());
        $this->assertEquals($this->testMemberId, $jyusub->getScode());
        $this->assertEquals('1', $jyusub->getJcode());
        $this->assertEquals('14', $jyusub->getPcode());
        $this->assertEquals('',$jyusub->getCcode());
        $this->assertEquals('',$jyusub->getCno());
        $this->assertEquals('',$jyusub->getCkigen());
        $this->assertEquals('',$jyusub->getCname());
        $this->assertEquals('',$jyusub->getCpay());
        $this->assertEquals('',$jyusub->getSyounin());
        $this->assertEquals('',$jyusub->getKaisuu());
        $this->assertEquals('',$jyusub->getBun1());
        $this->assertEquals('',$jyusub->getBun2());
        $this->assertEquals('100', $jyusub->getBcode());
        $this->assertEquals('100', $jyusub->getBkcode());
        $this->assertEquals('',$jyusub->getFcode1());
        $this->assertEquals('フリーコード2', $jyusub->getFcode2());
        $this->assertEquals('',$jyusub->getFcode3());
        $this->assertEquals('0', $jyusub->getSmpkbn());
        $this->assertEquals('0', $jyusub->getPointritu());
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyusub->getMemid());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyuden->getId());
        $this->assertNotNull($jyuden->getDenno());
        $this->assertEquals(null, $jyuden->getSday());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyuden->getDay()->toApiDateTime());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyuden->getYday()->toApiDateTime());
        $this->assertEquals(null, $jyuden->getSday());
        $this->assertEquals(null, $jyuden->getUday());
        $this->assertEquals(null, $jyuden->getNday());
        $this->assertEquals((new \Datetime)->modify('+14 day')->format('Ymd'), $jyuden->getHday()->toApiDateTime());
        $this->assertEquals('2', $jyuden->getHtime());
        $this->assertEquals('10', $jyuden->getHcode());
        $this->assertEquals('114', $jyuden->getNcode());
        $this->assertEquals('1', $jyuden->getNadr());
        $this->assertEquals('1', $jyuden->getSouko());
        $this->assertEquals('thong', $jyuden->getTcode());
        $this->assertEquals('1', $jyuden->getBunsyo());
        $this->assertEquals('0', $jyuden->getHrcd());
        $this->assertEquals('', $jyuden->getDbikou1());
        $this->assertEquals('', $jyuden->getDbikou2());
        $this->assertEquals('', $jyuden->getDbikou3());
        $this->assertEquals('', $jyuden->getNbikou1());
        $this->assertEquals('', $jyuden->getNbikou2());
        $this->assertEquals('送り状備考1', $jyuden->getObikou1());
        $this->assertEquals('', $jyuden->getObikou2());
        $this->assertEquals('', $jyuden->getNosi());
        $this->assertEquals('1', $jyuden->getOkurisuu());
        $this->assertEquals('', $jyuden->getOkurino());
        $this->assertEquals('', $jyuden->getFmemo1());
        $this->assertEquals('', $jyuden->getFmemo2());
        $this->assertEquals('', $jyuden->getFmemo3());
        $this->assertEquals('17007', $jyuden->getGtotal());
        $this->assertEquals('1000', $jyuden->getSouryou());
        $this->assertEquals('700', $jyuden->getTesuu());
        $this->assertEquals('500', $jyuden->getNebiki());
        $this->assertEquals('11000', $jyuden->getTtotal());
        $this->assertEquals('1100', $jyuden->getTax());
        $this->assertEquals('20307', $jyuden->getSyoukei());
        $this->assertEquals('0', $jyuden->getTyousei());
        $this->assertEquals('20307', $jyuden->getTotal());
        $this->assertEquals('0', $jyuden->getNouhin());
        $this->assertEquals('1', $jyuden->getYdaysuu());
        $this->assertEquals('DecisionCartTest', $jyuden->getOkurinusi());
        $this->assertEquals('0', $jyuden->getSkbn());
        $this->assertEquals('thong', $jyuden->getTncode());
        $this->assertEquals('8200', $jyuden->getUttotal());
        $this->assertEquals('743', $jyuden->getUtax());
        $this->assertEquals('7', $jyuden->getHttotal());
        $this->assertEquals('16462', $jyuden->getGtotalzn());
        $this->assertEquals('910', $jyuden->getSouryouzn());
        $this->assertEquals('637', $jyuden->getTesuuzn());
        $this->assertEquals('455', $jyuden->getNebikizn());
        $this->assertEquals('1843', $jyuden->getTaxtotal());
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyuden->getMemid());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei1->getId());
        $this->assertNotNull($jyumei1->getDenno());
        $this->assertEquals('0', $jyumei1->getGiftNo());
        $this->assertEquals('0', $jyumei1->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei1->getDay()->toApiDateTime());
        $this->assertEquals('1', $jyumei1->getLine());
        $this->assertEquals(null, $jyumei1->getSday());
        $this->assertEquals('1', $jyumei1->getSouko());
        $this->assertEquals('100', $jyumei1->getGcode());
        $this->assertEquals('10', $jyumei1->getSuu());
        $this->assertEquals('1364', $jyumei1->getTeika());
        $this->assertEquals('0', $jyumei1->getRitu());
        $this->assertEquals('1100', $jyumei1->getTanka());
        $this->assertEquals('11000', $jyumei1->getMoney());
        $this->assertEquals('0', $jyumei1->getTaxkbn());
        $this->assertEquals('', $jyumei1->getMbikou());
        $this->assertEquals('1000', $jyumei1->getGenka());
        $this->assertEquals('0', $jyumei1->getCkbn());
        $this->assertEquals('0', $jyumei1->getPoint());
        $this->assertEquals('0', $jyumei1->getSkbn());
        $this->assertEquals('1210', $jyumei1->getTintanka());
        $this->assertEquals('1100', $jyumei1->getTouttanka());
        $this->assertEquals('110', $jyumei1->getTaxtanka());
        $this->assertEquals('12100', $jyumei1->getTinmoney());
        $this->assertEquals('11000', $jyumei1->getToutmoney());
        $this->assertEquals('1100', $jyumei1->getTaxmoney());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei2->getId());
        $this->assertNotNull($jyumei2->getDenno());
        $this->assertEquals('0', $jyumei2->getGiftNo());
        $this->assertEquals('0', $jyumei2->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei2->getDay()->toApiDateTime());
        $this->assertEquals('2', $jyumei2->getLine());
        $this->assertEquals(null, $jyumei2->getSday());
        $this->assertEquals('1', $jyumei2->getSouko());
        $this->assertEquals('101', $jyumei2->getGcode());
        $this->assertEquals('5', $jyumei2->getSuu());
        $this->assertEquals('2000', $jyumei2->getTeika());
        $this->assertEquals('0', $jyumei2->getRitu());
        $this->assertEquals('1200', $jyumei2->getTanka());
        $this->assertEquals('6000', $jyumei2->getMoney());
        $this->assertEquals('1', $jyumei2->getTaxkbn());
        $this->assertEquals('', $jyumei2->getMbikou());
        $this->assertEquals('2200', $jyumei2->getGenka());
        $this->assertEquals('0', $jyumei2->getCkbn());
        $this->assertEquals('0', $jyumei2->getPoint());
        $this->assertEquals('0', $jyumei2->getSkbn());
        $this->assertEquals('1200', $jyumei2->getTintanka());
        $this->assertEquals('1091', $jyumei2->getTouttanka());
        $this->assertEquals('109', $jyumei2->getTaxtanka());
        $this->assertEquals('6000', $jyumei2->getTinmoney());
        $this->assertEquals('5455', $jyumei2->getToutmoney());
        $this->assertEquals('545', $jyumei2->getTaxmoney());
          
        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei3->getId());
        $this->assertNotNull($jyumei3->getDenno());
        $this->assertEquals('0', $jyumei3->getGiftNo());
        $this->assertEquals('0', $jyumei3->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei3->getDay()->toApiDateTime());
        $this->assertEquals('3', $jyumei3->getLine());
        $this->assertEquals(null, $jyumei3->getSday());
        $this->assertEquals('1', $jyumei3->getSouko());
        $this->assertEquals('102', $jyumei3->getGcode());
        $this->assertEquals('7', $jyumei3->getSuu());
        $this->assertEquals('2750', $jyumei3->getTeika());
        $this->assertEquals('0', $jyumei3->getRitu());
        $this->assertEquals('1', $jyumei3->getTanka());
        $this->assertEquals('7', $jyumei3->getMoney());
        $this->assertEquals('2', $jyumei3->getTaxkbn());
        $this->assertEquals('', $jyumei3->getMbikou());
        $this->assertEquals('0', $jyumei3->getGenka());
        $this->assertEquals('0', $jyumei3->getCkbn());
        $this->assertEquals('0', $jyumei3->getPoint());
        $this->assertEquals('0', $jyumei3->getSkbn());
        $this->assertEquals('1', $jyumei3->getTintanka());
        $this->assertEquals('1', $jyumei3->getTouttanka());
        $this->assertEquals('0', $jyumei3->getTaxtanka());
        $this->assertEquals('7', $jyumei3->getTinmoney());
        $this->assertEquals('7', $jyumei3->getToutmoney());
        $this->assertEquals('0', $jyumei3->getTaxmoney());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei4->getId());
        $this->assertNotNull($jyumei4->getDenno());
        $this->assertEquals('0', $jyumei4->getGiftNo());
        $this->assertEquals('0', $jyumei4->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei4->getDay()->toApiDateTime());
        $this->assertEquals('4', $jyumei4->getLine());
        $this->assertEquals(null, $jyumei4->getSday());
        $this->assertEquals('1', $jyumei4->getSouko());
        $this->assertEquals('s-1', $jyumei4->getGcode());
        $this->assertEquals('1', $jyumei4->getSuu());
        $this->assertEquals('0', $jyumei4->getTeika());
        $this->assertEquals('0', $jyumei4->getRitu());
        $this->assertEquals('1000', $jyumei4->getTanka());
        $this->assertEquals('1000', $jyumei4->getMoney());
        $this->assertEquals('1', $jyumei4->getTaxkbn());
        $this->assertEquals('', $jyumei4->getMbikou());
        $this->assertEquals('0', $jyumei4->getGenka());
        $this->assertEquals('0', $jyumei4->getCkbn());
        $this->assertEquals('0', $jyumei4->getPoint());
        $this->assertEquals('0', $jyumei4->getSkbn());
        $this->assertEquals('1000', $jyumei4->getTintanka());
        $this->assertEquals('910', $jyumei4->getTouttanka());
        $this->assertEquals('90', $jyumei4->getTaxtanka());
        $this->assertEquals('1000', $jyumei4->getTinmoney());
        $this->assertEquals('910', $jyumei4->getToutmoney());
        $this->assertEquals('90', $jyumei4->getTaxmoney());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei5->getId());
        $this->assertNotNull($jyumei5->getDenno());
        $this->assertEquals('0', $jyumei5->getGiftNo());
        $this->assertEquals('0', $jyumei5->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei5->getDay()->toApiDateTime());
        $this->assertEquals('5', $jyumei5->getLine());
        $this->assertEquals(null, $jyumei5->getSday());
        $this->assertEquals('1', $jyumei5->getSouko());
        $this->assertEquals('d-1', $jyumei5->getGcode());
        $this->assertEquals('1', $jyumei5->getSuu());
        $this->assertEquals('0', $jyumei5->getTeika());
        $this->assertEquals('0', $jyumei5->getRitu());
        $this->assertEquals('700', $jyumei5->getTanka());
        $this->assertEquals('700', $jyumei5->getMoney());
        $this->assertEquals('1', $jyumei5->getTaxkbn());
        $this->assertEquals('', $jyumei5->getMbikou());
        $this->assertEquals('0', $jyumei5->getGenka());
        $this->assertEquals('0', $jyumei5->getCkbn());
        $this->assertEquals('0', $jyumei5->getPoint());
        $this->assertEquals('0', $jyumei5->getSkbn());
        $this->assertEquals('700', $jyumei5->getTintanka());
        $this->assertEquals('637', $jyumei5->getTouttanka());
        $this->assertEquals('63', $jyumei5->getTaxtanka());
        $this->assertEquals('700', $jyumei5->getTinmoney());
        $this->assertEquals('637', $jyumei5->getToutmoney());
        $this->assertEquals('63', $jyumei5->getTaxmoney());

        $this->assertEquals(OverviewMapper::ACE_TEST_SYID, $jyumei6->getId());
        $this->assertNotNull($jyumei6->getDenno());
        $this->assertEquals('0', $jyumei6->getGiftNo());
        $this->assertEquals('0', $jyumei6->getDenku());
        $this->assertEquals((new \Datetime)->format('Ymd'), $jyumei6->getDay()->toApiDateTime());
        $this->assertEquals('6', $jyumei6->getLine());
        $this->assertEquals(null, $jyumei6->getSday());
        $this->assertEquals('1', $jyumei6->getSouko());
        $this->assertEquals('n-1', $jyumei6->getGcode());
        $this->assertEquals('1', $jyumei6->getSuu());
        $this->assertEquals('0', $jyumei6->getTeika());
        $this->assertEquals('0', $jyumei6->getRitu());
        $this->assertEquals('500', $jyumei6->getTanka());
        $this->assertEquals('500', $jyumei6->getMoney());
        $this->assertEquals('1', $jyumei6->getTaxkbn());
        $this->assertEquals('', $jyumei6->getMbikou());
        $this->assertEquals('0', $jyumei6->getGenka());
        $this->assertEquals('0', $jyumei6->getCkbn());
        $this->assertEquals('0', $jyumei6->getPoint());
        $this->assertEquals('0', $jyumei6->getSkbn());
        $this->assertEquals('500', $jyumei6->getTintanka());
        $this->assertEquals('455', $jyumei6->getTouttanka());
        $this->assertEquals('45', $jyumei6->getTaxtanka());
        $this->assertEquals('500', $jyumei6->getTinmoney());
        $this->assertEquals('455', $jyumei6->getToutmoney());
        $this->assertEquals('45', $jyumei6->getTaxmoney());

        $this->assertEquals(null, $point->getPointm());
        $this->assertEquals(null, $point->getPointp());

        $this->assertEquals('メール伝票備考', $mailjyuden->getTbikou());
        $this->assertEquals('decisionCart@AceClient.v1.0', $mailjyuden->getMail());

    }

    public function testRequestDecisionCartNG()
    {
        $this->assertTrue($this->addNewCart(-999));
        
        try {
            $decisionCartRequest = (new DecisionCart\DecisionCartRequestModel())
                                        ->setId(OverviewMapper::ACE_TEST_SYID)
                                        ->setSessId($this->testSessid);
            $response = (new AceClient)->makeJyudenService()
                                       ->makeDecisionCartMethod()
                                       ->withRequest($decisionCartRequest)
                                       ->send();
            if ($response->getStatusCode() === 200) {
                /** @var DecisionCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch (ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch (\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals('webjyuden検索エラー', $message1);
        $this->assertEmpty($message2);
    }

}