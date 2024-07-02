<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Master Service
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

class MasterService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Master';

    /**
     * Meke Get OkuriHkTime Method
     *
     * @return AceMethod\Master\GetOkuriHkTimeMethod
     */
    public function makeGetOkuriHkTimeMethod(): AceMethod\Master\GetOkuriHkTimeMethod
    {
        return new AceMethod\Master\GetOkuriHkTimeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreemst Method
     *
     * @return AceMethod\Master\GetGoodsFreemstMethod
     */
    public function makeGetGoodsFreemstMethod(): AceMethod\Master\GetGoodsFreemstMethod
    {
        return new AceMethod\Master\GetGoodsFreemstMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreeCd Method
     *
     * @return AceMethod\Master\GetGoodsFreeCdMethod
     */
    public function makeGetGoodsFreeCdMethod(): AceMethod\Master\GetGoodsFreeCdMethod
    {
        return new AceMethod\Master\GetGoodsFreeCdMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreememo Method
     *
     * @return AceMethod\Master\GetGoodsFreememoMethod
     */
    public function makeGetGoodsFreeMemoMethod(): AceMethod\Master\GetGoodsFreeMemoMethod
    {
        return new AceMethod\Master\GetGoodsFreeMemoMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFree Method
     *
     * @return AceMethod\Master\GetGoodsFreeMethod
     */
    public function makeGetGoodsFreeMethod(): AceMethod\Master\GetGoodsFreeMethod
    {
        return new AceMethod\Master\GetGoodsFreeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreemst Method
     *
     * @return AceMethod\Master\GetBumonFreemstMethod
     */
    public function makeGetBumonFreemstMethod(): AceMethod\Master\GetBumonFreemstMethod
    {
        return new AceMethod\Master\GetBumonFreemstMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreeCd Method
     *
     * @return AceMethod\Master\GetBumonFreeCdMethod
     */
    public function makeGetBumonFreeCdMethod(): AceMethod\Master\GetBumonFreeCdMethod
    {
        return new AceMethod\Master\GetBumonFreeCdMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreeMemo Method
     *
     * @return AceMethod\Master\GetBumonFreeMemoMethod
     */
    public function makeGetBumonFreeMemoMethod(): AceMethod\Master\GetBumonFreeMemoMethod
    {
        return new AceMethod\Master\GetBumonFreeMemoMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get BumonFree Method
     *
     * @return AceMethod\Master\GetBumonFreeMethod
     */
    public function makeGetBumonFreeMethod(): AceMethod\Master\GetBumonFreeMethod
    {
        return new AceMethod\Master\GetBumonFreeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreemst Method
     *
     * @return AceMethod\Master\GetMemberFreemstMethod
     */
    public function makeGetMemberFreemstMethod(): AceMethod\Master\GetMemberFreemstMethod
    {
        return new AceMethod\Master\GetMemberFreemstMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreeCd Method
     *
     * @return AceMethod\Master\GetMemberFreeCdMethod
     */
    public function makeGetMemberFreeCdMethod(): AceMethod\Master\GetMemberFreeCdMethod
    {
        return new AceMethod\Master\GetMemberFreeCdMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreeMemo Method
     *
     * @return AceMethod\Master\GetMemberFreeMemoMethod
     */
    public function makeGetMemberFreeMemoMethod(): AceMethod\Master\GetMemberFreeMemoMethod
    {
        return new AceMethod\Master\GetMemberFreeMemoMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemberFree Method
     *
     * @return AceMethod\Master\GetMemberFreeMethod
     */
    public function makeGetMemberFreeMethod(): AceMethod\Master\GetMemberFreeMethod
    {
        return new AceMethod\Master\GetMemberFreeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Id Method
     *
     * @return AceMethod\Master\GetIdMethod
     */
    public function makeGetIdMethod(): AceMethod\Master\GetIdMethod
    {
        return new AceMethod\Master\GetIdMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Souko Method
     *
     * @return AceMethod\Master\GetSoukoMethod
     */
    public function makeGetSoukoMethod(): AceMethod\Master\GetSoukoMethod
    {
        return new AceMethod\Master\GetSoukoMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Bumon Method
     *
     * @return AceMethod\Master\GetBumonMethod
     */
    public function makeGetBumonMethod(): AceMethod\Master\GetBumonMethod
    {
        return new AceMethod\Master\GetBumonMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Jcode Method
     *
     * @return AceMethod\Master\GetJcodeMethod
     */
    public function makeGetJcodeMethod(): AceMethod\Master\GetJcodeMethod
    {
        return new AceMethod\Master\GetJcodeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Pcode Method
     *
     * @return AceMethod\Master\GetPcodeMethod
     */
    public function makeGetPcodeMethod(): AceMethod\Master\GetPcodeMethod
    {
        return new AceMethod\Master\GetPcodeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Staff Method
     *
     * @return AceMethod\Master\GetStaffMethod
     */
    public function makeGetStaffMethod(): AceMethod\Master\GetStaffMethod
    {
        return new AceMethod\Master\GetStaffMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Okuri Method
     *
     * @return AceMethod\Master\GetOkuriMethod
     */
    public function makeGetOkuriMethod(): AceMethod\Master\GetOkuriMethod
    {
        return new AceMethod\Master\GetOkuriMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Hktime Method
     *
     * @return AceMethod\Master\GetHktimeMethod
     */
    public function makeGetHktimeMethod(): AceMethod\Master\GetHktimeMethod
    {
        return new AceMethod\Master\GetHktimeMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Baitai Method
     *
     * @return AceMethod\Master\GetBaitaiMethod
     */
    public function makeGetBaitaiMethod(): AceMethod\Master\GetBaitaiMethod
    {
        return new AceMethod\Master\GetBaitaiMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get Baifile Method
     *
     * @return AceMethod\Master\GetBaifileMethod
     */
    public function makeGetBaifileMethod(): AceMethod\Master\GetBaifileMethod
    {
        return new AceMethod\Master\GetBaifileMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemAnkFreemst Method
     *
     * @return AceMethod\Master\GetMemAnkFreemstMethod
     */
    public function makeGetMemAnkFreemstMethod(): AceMethod\Master\GetMemAnkFreemstMethod
    {
        return new AceMethod\Master\GetMemAnkFreemstMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemAnkFreeCd Method
     *
     * @return AceMethod\Master\GetMemAnkFreeCdMethod
     */
    public function makeGetMemAnkFreeCdMethod(): AceMethod\Master\GetMemAnkFreeCdMethod
    {
        return new AceMethod\Master\GetMemAnkFreeCdMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke Get MemAnk Method
     *
     * @return AceMethod\Master\GetMemAnkMethod
     */
    public function makeGetMemAnkMethod(): AceMethod\Master\GetMemAnkMethod
    {
        return new AceMethod\Master\GetMemAnkMethod($this->baseServiceName, $this->serviceRetriever);
    }

    /**
     * Meke GetHoliday Method
     *
     * @return AceMethod\Master\GetHolidayMethod
     */
    public function makeGetHolidayMethod(): AceMethod\Master\GetHolidayMethod
    {
        return new AceMethod\Master\GetHolidayMethod($this->baseServiceName, $this->serviceRetriever);
    }
}