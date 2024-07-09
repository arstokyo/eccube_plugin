<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Hanpu;

use Plugin\AceClient\AceServices\Model\Request\Hanpu\GetHanpuRireki\GetHanpuRirekiRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpuRireki\GetHanpuRirekiResponseModel;
use GuzzleHttp\Exception\ClientException;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Plugin\AceClient\Util\Serializer;
use Plugin\AceClient\Tests\AceRequestTest\AceRequestTestAbtract;

class GetHanpuRirekiRequestModelTest extends AceRequestTestAbtract
{
    public function testSearializeGetHanpuRireki()
    {
        $getHanpuRirekiRequestModel = $this->GetHanpuRirekiRequestForSerialize();
        $serializer = Serializer\SerializerFactory::makeSoapSerializerForTest();
        $serializedData = $serializer->serialize($getHanpuRirekiRequestModel);

        $xmlns = $serializer->getConfig()->getXmlns() ?
                 $serializer->getConfig()->getXmlns()['@xmlns'] :
                 Serializer\SoapXmlSerializer::DEFAULT_XMLNS['@xmlns'];
        $soapHead = $serializer->getConfig()->getRequestSoapHead() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_HEAD;
        $soapEnd = $serializer->getConfig()->getRequestSoapEnd() ?: Serializer\SoapXmlSerializer::DEFAULT_REQUEST_SOAP_END;
        $expectedData =
        <<<XML
        {$soapHead}
            <getHanpuRireki xmlns="{$xmlns}">
                <id>13</id>
                <mcode>348</mcode>
            </getHanpuRireki>
        {$soapEnd}
        XML;
        $this->assertEquals(preg_replace('/\s+/', '', $expectedData), preg_replace('/\s+/', '', $serializedData));
    }


    public function GetHanpuRirekiRequestForSerialize(): GetHanpuRirekiRequestModel
    {
        $hanpuRireki = new GetHanpuRirekiRequestModel();
        $getHanpuRireki = $hanpuRireki->setId(OverviewMapper::ACE_TEST_SYID)
                                      ->setMcode("348");
        return $getHanpuRireki;
    }

    public function GetHanpuRirekiRequestOK(): GetHanpuRirekiRequestModel
    {
        $hanpuRireki = new GetHanpuRirekiRequestModel();
        $getHanpuRireki = $hanpuRireki->setId(OverviewMapper::ACE_TEST_SYID)
                                      ->setMcode("231");
        return $getHanpuRireki;
    }
    public function GetHanpuRirekiRequestNG(): GetHanpuRirekiRequestModel
    {
        $hanpuRireki = new GetHanpuRirekiRequestModel();
        $getHanpuRireki = $hanpuRireki->setId(13)
                                      ->setMcode("-1");
        return $getHanpuRireki;
    }
    public function testRequestGetHanpuRirekiOK()
    {
        try {
            $getHanpuRirekiRequest = $this->GetHanpuRirekiRequestOK();
            $response = $this->aceClient->makeHanpuService()
                                        ->makeGetHanpuRirekiMethod()
                                        ->withRequest($getHanpuRirekiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHanpuRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getHanpu()->getMessage()->getMessage1();
                $handen1 = $responseObj->getHanpu()->getHanden()[0];
                $hanmei1 = $handen1->getHanmei();
                $handen2 = $responseObj->getHanpu()->getHanden()[1];
                $hanmei2 = $handen1->getHanmei();
                $message = $responseObj->getHanpu()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(1, $handen1->getNowcnt());
        $this->assertEquals(1, $handen1->getSite());
        $this->assertEquals(null, $handen1->getSdd());
        $this->assertEquals(null, $handen1->getWeeksite());
        $this->assertEquals(null, $handen1->getWeekday());
        $this->assertEquals(31, $handen1->getOtodokedd());
        $this->assertEquals(null, $handen1->getOtodokewsite());
        $this->assertEquals(null, $handen1->getOtodokewday());
        $this->assertEquals(21, $handen1->getHanpu());
        $this->assertEquals("", $handen1->getCcode());
        $this->assertEquals("", $handen1->getCno());
        $this->assertEquals(null, $handen1->getCkigen());
        $this->assertEquals(null, $handen1->getCpay());
        $this->assertEquals("", $handen1->getSyounin());
        $this->assertEquals(null, $handen1->getKaisuu());
        $this->assertEquals(1, $handen1->getScnt());
        $this->assertEquals(0, $handen1->getEcnt());
        $this->assertEquals(1, $handen1->getSitekbn());
        $this->assertEquals(null, $handen1->getEday());
        $this->assertEquals(0, $handen1->getYkbn());
        $this->assertEquals(0, $handen1->getFinflg());
        $this->assertEquals(null, $handen1->getFinday());
        $this->assertEquals("thong", $handen1->getTncode());
        $this->assertEquals(0, $handen1->getBunsyo());
        $this->assertEquals(0, $handen1->getNouhin());
        $this->assertEquals("100", $handen1->getBcodef());
        $this->assertEquals("100", $handen1->getBkcodef());
        $this->assertEquals(0, $handen1->getCamflg());
        $this->assertEquals(null, $handen1->getHcode2());
        $this->assertEquals(null, $handen1->getPcode2());
        $this->assertEquals(1, $handen1->getHtype());
        $this->assertEquals(0, $handen1->getGiftfg());
        $this->assertEquals(0, $handen1->getUskbn());
        $this->assertEquals(null, $handen1->getOtodokeday());
        $this->assertEquals("", $handen1->getHbikou1());
        $this->assertEquals("", $handen1->getHbikou2());
        $this->assertEquals("thong", $handen1->getTcode());
        $this->assertEquals(1, $handen1->getJcode());
        $this->assertEquals(14, $handen1->getPcode());
        $this->assertEquals("100", $handen1->getBcode());
        $this->assertEquals("100", $handen1->getBkcode());
        $this->assertEquals("100", $handen1->getBumon());
        $this->assertEquals("1", $handen1->getSouko());
        $this->assertEquals(10, $handen1->getHcode());
        $this->assertEquals(2, $handen1->getHtime());
        $this->assertEquals("", $handen1->getFcode1());
        $this->assertEquals("", $handen1->getFcode2());
        $this->assertEquals("", $handen1->getFcode3());
        $this->assertEquals("", $handen1->getNbikou1());
        $this->assertEquals("", $handen1->getNbikou2());
        $this->assertEquals("", $handen1->getObikou1());
        $this->assertEquals("", $handen1->getObikou2());
        $this->assertEquals(0, $handen1->getTorikbn());
        $this->assertEquals("231", $handen1->getMcode());
        $this->assertEquals("231", $handen1->getScode());
        $this->assertEquals("", $handen1->getCname());
        $this->assertEquals("231", $handen1->getNcode());
        $this->assertEquals("1", $handen1->getNadr());
        $this->assertEquals(null, $handen1->getHday());
        $this->assertEquals(13, $handen1->getMemid());
        $this->assertEquals(94, $handen1->getDenno());
        $this->assertEquals("", $handen1->getCeda());
        $this->assertEquals("2029-07-04", $handen1->getDay()->toShortDate());
        $this->assertEquals("2029-07-04", $handen1->getSday()->toShortDate());

        $this->assertEquals("1", $hanmei1->getEda());
        $this->assertEquals("102", $hanmei1->getGcode());
        $this->assertEquals(17, $hanmei1->getSuu());
        $this->assertEquals(1990, $hanmei1->getTanka());
        $this->assertEquals(0, $hanmei1->getKousin());
        $this->assertEquals(1, $hanmei1->getKsite());

        $this->assertEquals(1, $handen2->getNowcnt());
        $this->assertEquals(1, $handen2->getSite());
        $this->assertEquals(null, $handen2->getSdd());
        $this->assertEquals(null, $handen2->getWeeksite());
        $this->assertEquals(null, $handen2->getWeekday());
        $this->assertEquals(31, $handen2->getOtodokedd());
        $this->assertEquals(null, $handen2->getOtodokewsite());
        $this->assertEquals(null, $handen2->getOtodokewday());
        $this->assertEquals(21, $handen2->getHanpu());
        $this->assertEquals("", $handen2->getCcode());
        $this->assertEquals("", $handen2->getCno());
        $this->assertEquals(null, $handen2->getCkigen());
        $this->assertEquals(null, $handen2->getCpay());
        $this->assertEquals("", $handen2->getSyounin());
        $this->assertEquals(null, $handen2->getKaisuu());
        $this->assertEquals(1, $handen2->getScnt());
        $this->assertEquals(0, $handen2->getEcnt());
        $this->assertEquals(1, $handen2->getSitekbn());
        $this->assertEquals(null, $handen2->getEday());
        $this->assertEquals(0, $handen2->getYkbn());
        $this->assertEquals(0, $handen2->getFinflg());
        $this->assertEquals(null, $handen2->getFinday());
        $this->assertEquals("thong", $handen2->getTncode());
        $this->assertEquals(0, $handen2->getBunsyo());
        $this->assertEquals(0, $handen2->getNouhin());
        $this->assertEquals("100", $handen2->getBcodef());
        $this->assertEquals("100", $handen2->getBkcodef());
        $this->assertEquals(0, $handen2->getCamflg());
        $this->assertEquals(null, $handen2->getHcode2());
        $this->assertEquals(null, $handen2->getPcode2());
        $this->assertEquals(1, $handen2->getHtype());
        $this->assertEquals(0, $handen2->getGiftfg());
        $this->assertEquals(0, $handen2->getUskbn());
        $this->assertEquals(null, $handen2->getOtodokeday());
        $this->assertEquals("", $handen2->getHbikou1());
        $this->assertEquals("", $handen2->getHbikou2());
        $this->assertEquals("thong", $handen2->getTcode());
        $this->assertEquals(1, $handen2->getJcode());
        $this->assertEquals(14, $handen2->getPcode());
        $this->assertEquals("100", $handen2->getBcode());
        $this->assertEquals("100", $handen2->getBkcode());
        $this->assertEquals("100", $handen2->getBumon());
        $this->assertEquals("1", $handen2->getSouko());
        $this->assertEquals(10, $handen2->getHcode());
        $this->assertEquals(2, $handen2->getHtime());
        $this->assertEquals("", $handen2->getFcode1());
        $this->assertEquals("", $handen2->getFcode2());
        $this->assertEquals("", $handen2->getFcode3());
        $this->assertEquals("", $handen2->getNbikou1());
        $this->assertEquals("", $handen2->getNbikou2());
        $this->assertEquals("", $handen2->getObikou1());
        $this->assertEquals("", $handen2->getObikou2());
        $this->assertEquals(0, $handen2->getTorikbn());
        $this->assertEquals("231", $handen2->getMcode());
        $this->assertEquals("231", $handen2->getScode());
        $this->assertEquals("", $handen2->getCname());
        $this->assertEquals("231", $handen2->getNcode());
        $this->assertEquals("1", $handen2->getNadr());
        $this->assertEquals(null, $handen2->getHday());
        $this->assertEquals(13, $handen2->getMemid());
        $this->assertEquals(84, $handen2->getDenno());
        $this->assertEquals("", $handen2->getCeda());
        $this->assertEquals("2024-06-27", $handen2->getDay()->toShortDate());
        $this->assertEquals("2024-06-27", $handen2->getSday()->toShortDate());

        $this->assertEquals("1", $hanmei2->getEda());
        $this->assertEquals("102", $hanmei2->getGcode());
        $this->assertEquals(17, $hanmei2->getSuu());
        $this->assertEquals(1990, $hanmei2->getTanka());
        $this->assertEquals(0, $hanmei2->getKousin());
        $this->assertEquals(1, $hanmei2->getKsite());

        $this->assertEquals("", $message->getMessage1());
        $this->assertEquals("", $message->getMessage2());
    }

    public function testRequestGetHanpuRirekiNG()
    {
    
        try {
            $getHanpuRirekiRequest = $this->GetHanpuRirekiRequestNG();
            $response = $this->aceClient->makeHanpuService()
                                        ->makeGetHanpuRirekiMethod()
                                        ->withRequest($getHanpuRirekiRequest)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetHanpuRirekiResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getHanpu()->getMessage()->getMessage1();
                $handen = $responseObj->getHanpu()->getHanden();
                $message = $responseObj->getHanpu()->getMessage();

            }
        } catch(ClientException $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        $this->assertEquals(null, $handen);
        $this->assertEquals("頒布データが存在しません", $message->getMessage1());
        $this->assertEquals("select hd.hdenno denno,to_char(hd.jday,'yyyymmdd') day,hd.hpid hanpu,jd.thflg torikbn,hd.bmid bumon,jd.jmemid mcode,jd.smemid scode,hd.jtid jcode,hd.ksid pcode,null ccode,null cno,hd.orderid ceda,null ckigen,null cname,null cpay,null syounin,null kaisuu,hd.btid bcode,hd.bkid bkcode,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jfcode1,103001)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) fcode1,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jfcode2,103002)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) fcode2,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jfcode3,103003)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) fcode3,hd.hsid hcode,hd.nmemid ncode,hd.nmemno nadr,hd.skid souko,hd.cuser tcode,(select min(hcnt) from jyuden where syid=hd.syid and hdenno=hd.hdenno) scnt,hd.endcnt ecnt,case hd.sitekbn when 0 then 0 else 1 end sitekbn,hd.site site,to_char((select min(yday) from jyuden where syid=jd.syid and hdenno=jd.hdenno),'yyyymmdd') sday,to_char(hd.endday,'yyyymmdd') eday,0 ykbn,case hd.status when 0 then 0 else 1 end finflg,case when hd.status=0 then null else to_char(hd.finday,'yyyymmdd') end finday,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jnbikou1,200004)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) nbikou1,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jnbikou2,200004)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) nbikou2,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jobikou1,200005)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) obikou1,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.jobikou2,200005)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) obikou2,hd.cuser tncode,jd.bnid bunsyo,jd.prflg nouhin,hd.htid htime,(select min(case when to_char(hday,'yyyymmdd')<=to_char(sysdate,'yyyymmdd') then case when hhday<=sysdate then null else to_char(hhday,'yyyymmdd') end else to_char(hday,'yyyymmdd') end) from jyuden where syid=jd.syid and hdenno=jd.hdenno) hday,hd.btid bcodef,hd.bkid bkcodef,jd.cpflg camflg,case when hd.sckbn=0 then hd.fixedday else null end sdd,case when hd.sckbn=0 then hd.hmweek else null end weeksite,case when hd.sckbn=0 then hd.dayweek else null end weekday,null hcode2,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.hdbikou1,203010)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) hbikou1,(select free from edfree edf inner join sysidweb syw on syw.syid=edf.syid and edf.denno=hd.hdenno and nvl(syw.hdbikou2,203010)=edf.fmkbn and edf.kubun=3 where edf.syid = hd.syid) hbikou2,null pcode2,case when ht.hpkbn=0 then 0 else 1 end htype,0 giftfg,jd.uskbn uskbn,hd.msyid memid,to_char((select min(hday) from jyuden where syid=jd.syid and hdenno=jd.hdenno),'yyyymmdd') otodokeday,case when hd.sckbn=1 then hd.fixedday else null end otodokedd,case when hd.sckbn=1 then hd.hmweek else null end otodokewsite,case when hd.sckbn=1 then hd.dayweek else null end otodokewday,(select min(case when to_char(hday,'yyyymmdd')<=to_char(sysdate,'yyyymmdd') then case when hhday<=sysdate then hcnt else hncnt end else hcnt end) from jyuden where syid=jd.syid and hdenno=jd.hdenno) nowcnt from handen hd inner join jyuden jd on jd.syid=hd.syid and jd.hdenno=hd.hdenno left join hpmst ht on ht.syid=hd.syid and ht.hpid=hd.hpid left join jyutran jt on jd.syid=jt.syid and jd.denno=jt.denno and jd.edano=jt.edano inner join kessai ks on ks.syid=hd.syid and ks.ksid=hd.ksid where hd.syid=:xsyid and jd.jmemid=:xjmemid and hd.status=0 and jd.hyday=(select max(hyday) from jyuden where syid=hd.syid and hdenno=hd.hdenno and nouno=1 and edano=1) and jd.hncnt=(select max(hncnt) from jyuden where syid=hd.syid and hdenno=hd.hdenno and nouno=1 and edano=1 and hyday=(select max(hyday) from jyuden where syid=hd.syid and hdenno=hd.hdenno and nouno=1 and edano=1)) and jd.nouno=1 and jd.edano=1 order by day desc,denno desc", $message->getMessage2());
    }
}
