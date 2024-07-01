<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for Jyuden Model Group2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelGroup2Interface extends JyudenModelBaseInterface,
                                             NoCategory\HasIdInterface,
                                             GiftAndCampaign\HasGiftNoInterface,
                                             Denpyo\HasDenkuInterface,
                                             Denpyo\HasMemIdInterface,
                                             Day\HasDayModelGroup1Interface,
                                             Nmember\HasNcodeInterface,
                                             Nmember\HasNadrInterface,
                                             OkuriAndNouhin\HasOkuriSuuInterface,
                                             OkuriAndNouhin\HasOkuriNoInterface,
                                             OkuriAndNouhin\HasOkuriNusiInterface,
                                             Good\HasGtotalInterface,
                                             Cost\HasTTotalInterface,
                                             Cost\HasSyoukeiInterface,
                                             Cost\HasTotalInterface,
                                             Cost\Tax\HasTaxInterface,
                                             Cost\Tax\HasUTTotalInterface,
                                             Cost\Tax\HasUtaxInterface,
                                             Cost\Tax\HasHTTotalInterface,
                                             Cost\Tax\HasTaxTotalInterface,
                                             Cost\Souryou\HasSouryouZnInterface,
                                             Cost\Tesuu\HasTesuuZnInterface,
                                             Cost\Nebiki\HasNebikiZnInteface

{

    /**
     * Get 返品理由コード
     * 
     * @return ?int
     */
    public function getHrcd(): ?int;

    /**
     * Set 返品理由コード
     * 
     * @param int|null $hrcd
     * @return $this
     */
    public function setHrcd(?int $hrcd);

    /**
     * Get 新規入力担当者コード
     * 
     * @return ?string
     */
    public function getTncode(): ?string;

    /**
     * Set 新規入力担当者コード
     * 
     * @param string|null $tncode
     * @return $this
     */
    public function setTncode(?string $tncode);

    /**
     * Get 伝票調整額
     * 
     * @return ?float
     */
    public function getTyousei(): ?float;

    /**
     * Set 伝票調整額
     * 
     * @param string|null $tyousei
     * @return $this
     */
    public function setTyousei(?string $tyousei);

    /**
     * Get 納品書印刷フラグ
     * 
     * @return ?int
     */
    public function getNouhin(): ?int;

    /**
     * Set 納品書印刷フラグ
     * 
     * @param int|null $nouhin
     * @return $this
     */
    public function setNouhin(?int $nouhin);

    /**
     * Get 出荷予定回数
     * 
     * @return ?int
     */
    public function getYdaysuu(): ?int;

    /**
     * Set 出荷予定回数
     * 
     * @param int|null $ydaysuu
     * @return $this
     */
    public function setYdaysuu(?int $ydaysuu);

    /**
     * Get 税抜き商品合計
     * 
     * @return ?float
     */
    public function getGtotalzn(): ?float;

    /**
     * Set 税抜き商品合計
     * 
     * @param string|null $gtotalzn
     * @return $this
     */
    public function setGtotalzn(?string $gtotalzn);

}