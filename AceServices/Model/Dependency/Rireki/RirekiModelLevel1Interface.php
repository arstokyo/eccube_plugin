<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelLevel1Interface extends Denpyo\Jyuden\HasDayInterface,
                                            Denpyo\HasDennoInterface,
                                            Payment\HasPnameInterface,
                                            Denpyo\HasDenkuInterface,
                                            Denpyo\HasDenKbnInterface,
                                            Haiso\HaisoModelGroup1Interface,
                                            OkuriAndNouhin\HasOkuriNoInterface,
                                            NoCategory\HasSdateInterface,
                                            Good\HasGtotalInterface,
                                            Haiso\HasSouRyouInterface,
                                            Cost\Tesuu\HasTesuuInterface,
                                            Cost\NeBiki\HasNebikiInterface,
                                            Point\HasPointPInterface,
                                            Point\HasPointMInterface,
                                            Denpyo\Jyuden\HasSdayInterface,
                                            Denpyo\Jyuden\HasUdayInterface,
                                            Denpyo\Jyuden\HasNdayInterface,
                                            Denpyo\Jyuden\HasZandakaInterface,
                                            Haiso\HasHdayInterface
{
    /**
     * Get 行番号
     *
     * @return ?int
     */
    public function getRno(): ?int;

    /**
     * Set 行番号
     *
     * @param ?int $rno
     */
    public function setRno(?int $rno);

    /**
     * Get 行数
     *
     * @return ?int
     */
    public function getMaxrow(): ?int;

    /**
     * Set 行数
     *
     * @param ?int $maxrow
     */
    public function setMaxrow(?int $maxrow);

    /**
     * Get 受注方法
     *
     * @return ?string
     */
    public function getJname(): ?string;

    /**
     * Set 受注方法
     *
     * @param ?string $jname
     */
    public function setJname(?string $jname);

    /**
     * Get 伝票合計額
     *
     * @return ?int
     */
    public function getTotal(): ?int;

    /**
     * Set 伝票合計額
     *
     * @param ?int $total
     */
    public function setTotal(?int $total);

    /**
     * Get URL
     *
     * @return ?string
     */
    public function getUrl(): ?string;

    /**
     * Set URL
     *
     * @param ?string $url
     */
    public function setUrl(?string $url);

    /**
     * Get 小計
     *
     * @return ?int
     */
    public function getSyoukei(): ?int;

    /**
     * Set 小計
     *
     * @param ?int $syoukei
     */
    public function setSyoukei(?int $syoukei);

}