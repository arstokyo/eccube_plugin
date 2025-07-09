<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceMethod;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceServiceInterface;

/**
 * Master Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
class MasterService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Master';

    /**
     * Meke Get OkuriHkTime Method
     *
     * @deprecated Inject GetOkuriHkTimeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetOkuriHkTimeMethod
     */
    public function makeGetOkuriHkTimeMethod(): AceMethod\Master\GetOkuriHkTimeMethod
    {
        return new AceMethod\Master\GetOkuriHkTimeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreemst Method
     *
     * @deprecated Inject GetGoodsFreemstMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetGoodsFreemstMethod
     */
    public function makeGetGoodsFreemstMethod(): AceMethod\Master\GetGoodsFreemstMethod
    {
        return new AceMethod\Master\GetGoodsFreemstMethod($this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreeCd Method
     *
     * @deprecated Inject GetGoodsFreeCdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetGoodsFreeCdMethod
     */
    public function makeGetGoodsFreeCdMethod(): AceMethod\Master\GetGoodsFreeCdMethod
    {
        return new AceMethod\Master\GetGoodsFreeCdMethod($this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFreememo Method
     *
     * @deprecated Inject GetGoodsFreememoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetGoodsFreememoMethod
     */
    public function makeGetGoodsFreeMemoMethod(): AceMethod\Master\GetGoodsFreeMemoMethod
    {
        return new AceMethod\Master\GetGoodsFreeMemoMethod($this->serviceRetriever);
    }

    /**
     * Meke Get GoodsFree Method
     *
     * @deprecated Inject GetGoodsFreeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetGoodsFreeMethod
     */
    public function makeGetGoodsFreeMethod(): AceMethod\Master\GetGoodsFreeMethod
    {
        return new AceMethod\Master\GetGoodsFreeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreemst Method
     *
     * @deprecated Inject GetBumonFreemstMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBumonFreemstMethod
     */
    public function makeGetBumonFreemstMethod(): AceMethod\Master\GetBumonFreemstMethod
    {
        return new AceMethod\Master\GetBumonFreemstMethod($this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreeCd Method
     *
     * @return AceMethod\Master\GetBumonFreeCdMethod
     */
    public function makeGetBumonFreeCdMethod(): AceMethod\Master\GetBumonFreeCdMethod
    {
        return new AceMethod\Master\GetBumonFreeCdMethod($this->serviceRetriever);
    }

    /**
     * Meke Get BumonFreeMemo Method
     *
     * @deprecated Inject GetBumonFreeMemoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBumonFreeMemoMethod
     */
    public function makeGetBumonFreeMemoMethod(): AceMethod\Master\GetBumonFreeMemoMethod
    {
        return new AceMethod\Master\GetBumonFreeMemoMethod($this->serviceRetriever);
    }

    /**
     * Meke Get BumonFree Method
     *
     * @deprecated Inject GetBumonFreeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBumonFreeMethod
     */
    public function makeGetBumonFreeMethod(): AceMethod\Master\GetBumonFreeMethod
    {
        return new AceMethod\Master\GetBumonFreeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreemst Method
     *
     * @deprecated Inject GetBumonFreeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemberFreemstMethod
     */
    public function makeGetMemberFreemstMethod(): AceMethod\Master\GetMemberFreemstMethod
    {
        return new AceMethod\Master\GetMemberFreemstMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreeCd Method
     *
     * @deprecated Inject GetMemberFreeCdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemberFreeCdMethod
     */
    public function makeGetMemberFreeCdMethod(): AceMethod\Master\GetMemberFreeCdMethod
    {
        return new AceMethod\Master\GetMemberFreeCdMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemberFreeMemo Method
     *
     * @deprecated Inject GetMemberFreeMemoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemberFreeMemoMethod
     */
    public function makeGetMemberFreeMemoMethod(): AceMethod\Master\GetMemberFreeMemoMethod
    {
        return new AceMethod\Master\GetMemberFreeMemoMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemberFree Method
     *
     * @deprecated Inject GetMemberFreeMethod as a service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemberFreeMethod
     */
    public function makeGetMemberFreeMethod(): AceMethod\Master\GetMemberFreeMethod
    {
        return new AceMethod\Master\GetMemberFreeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Id Method
     *
     * @deprecated Inject GetIdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetIdMethod
     */
    public function makeGetIdMethod(): AceMethod\Master\GetIdMethod
    {
        return new AceMethod\Master\GetIdMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Souko Method
     *
     * @deprecated Inject GetSoukoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetSoukoMethod
     */
    public function makeGetSoukoMethod(): AceMethod\Master\GetSoukoMethod
    {
        return new AceMethod\Master\GetSoukoMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Bumon Method
     *
     * @deprecated Inject GetBumonMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBumonMethod
     */
    public function makeGetBumonMethod(): AceMethod\Master\GetBumonMethod
    {
        return new AceMethod\Master\GetBumonMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Jcode Method
     *
     * @deprecated Inject GetJcodeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetJcodeMethod
     */
    public function makeGetJcodeMethod(): AceMethod\Master\GetJcodeMethod
    {
        return new AceMethod\Master\GetJcodeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Pcode Method
     *
     * @deprecated Inject GetPcodeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetPcodeMethod
     */
    public function makeGetPcodeMethod(): AceMethod\Master\GetPcodeMethod
    {
        return new AceMethod\Master\GetPcodeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Staff Method
     *
     * @deprecated Inject GetStaffMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetStaffMethod
     */
    public function makeGetStaffMethod(): AceMethod\Master\GetStaffMethod
    {
        return new AceMethod\Master\GetStaffMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Okuri Method
     *
     * @deprecated Inject GetOkuriMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetOkuriMethod
     */
    public function makeGetOkuriMethod(): AceMethod\Master\GetOkuriMethod
    {
        return new AceMethod\Master\GetOkuriMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Hktime Method
     *
     * @deprecated Inject GetHktimeMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetHktimeMethod
     */
    public function makeGetHktimeMethod(): AceMethod\Master\GetHktimeMethod
    {
        return new AceMethod\Master\GetHktimeMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Baitai Method
     *
     * @deprecated Inject GetBaitaiMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBaitaiMethod
     */
    public function makeGetBaitaiMethod(): AceMethod\Master\GetBaitaiMethod
    {
        return new AceMethod\Master\GetBaitaiMethod($this->serviceRetriever);
    }

    /**
     * Meke Get Baifile Method
     *
     * @deprecated Inject GetBaifileMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetBaifileMethod
     */
    public function makeGetBaifileMethod(): AceMethod\Master\GetBaifileMethod
    {
        return new AceMethod\Master\GetBaifileMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemAnkFreemst Method
     *
     * @deprecated Inject GetMemAnkFreemstMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemAnkFreemstMethod
     */
    public function makeGetMemAnkFreemstMethod(): AceMethod\Master\GetMemAnkFreemstMethod
    {
        return new AceMethod\Master\GetMemAnkFreemstMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemAnkFreeCd Method
     *
     * @deprecated Inject GetMemAnkFreeCdMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemAnkFreeCdMethod
     */
    public function makeGetMemAnkFreeCdMethod(): AceMethod\Master\GetMemAnkFreeCdMethod
    {
        return new AceMethod\Master\GetMemAnkFreeCdMethod($this->serviceRetriever);
    }

    /**
     * Meke Get MemAnk Method
     *
     * @deprecated Inject GetMemAnkMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetMemAnkMethod
     */
    public function makeGetMemAnkMethod(): AceMethod\Master\GetMemAnkMethod
    {
        return new AceMethod\Master\GetMemAnkMethod($this->serviceRetriever);
    }

    /**
     * Meke GetHoliday Method
     *
     * @deprecated Inject GetHolidayMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetHolidayMethod
     */
    public function makeGetHolidayMethod(): AceMethod\Master\GetHolidayMethod
    {
        return new AceMethod\Master\GetHolidayMethod($this->serviceRetriever);
    }

    /**
     * Meke GetFreeCdWithName Method
     *
     * @deprecated Inject GetFreeCdWithNameMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Master\GetFreeCdWithNameMethod
     */
    public function makeGetFreeCdWithNameMethod(): AceMethod\Master\GetFreeCdWithNameMethod
    {
        return new AceMethod\Master\GetFreeCdWithNameMethod($this->serviceRetriever);
    }
}
