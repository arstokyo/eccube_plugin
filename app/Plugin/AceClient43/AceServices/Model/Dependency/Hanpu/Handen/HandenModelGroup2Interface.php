<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for HandenModelGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelGroup2Interface extends HandenModelBaseInterface,
                                             Denpyo\HasToriKbnInterface,
                                             NoCategory\HasMcodeInterface,
                                             Denpyo\HasScodeInterface,
                                             Card\HasCnameInterface,
                                             Person\Nmember\HasNcodeInterface,
                                             Person\Nmember\HasNadrInterface,
                                             Day\HasSdayInterface,
                                             OkuriAndNouhin\HasBunsyoInterface,
                                             Day\HasHdayInterface,
                                             Denpyo\HasMemIdInterface
{
    /**
     * Get 頒布コード
     *
     * @return ?int
     */
    public function getHanpu(): ?int;

    /**
     * Set 頒布コード
     *
     * @param ?int $hanpu
     * @return $this
     */
    public function setHanpu(?int $hanpu);

    /**
     * Get カード会社コード
     *
     * @return ?string
     */
    public function getCcode(): ?string;

    /**
     * Set カード会社コード
     *
     * @param ?string $ccode
     * @return $this
     */
    public function setCcode(?string $ccode);

    /**
     * Get カード番号
     *
     * @return ?string
     */
    public function getCno(): ?string;

    /**
     * Set カード番号
     *
     * @param ?string $cno
     * @return $this
     */
    public function setCno(?string $cno);

    /**
     * Get カード期限
     *
     * @return ?int
     */
    public function getCkigen(): ?int;

    /**
     * Set カード期限
     *
     * @param ?int $ckigen
     * @return $this
     */
    public function setCkigen(?int $ckigen);

    /**
     * Get カード支払方法
     *
     * @return ?int
     */
    public function getCpay(): ?int;

    /**
     * Set カード支払方法
     *
     * @param ?int $ 
     * @return $this
     */
    public function setCpay(?int $cpay);

    /**
     * Get カード承認番号
     *
     * @return ?string
     */
    public function getSyounin(): ?string;

    /**
     * Set カード承認番号
     *
     * @param ?string $syounin
     * @return $this
     */
    public function setSyounin(?string $syounin);

    /**
     * Get 支払回数
     *
     * @return ?int
     */
    public function getKaisuu(): ?int;

    /**
     * Set 支払回数
     *
     * @param ?int $kaisuu
     * @return $this
     */
    public function setKaisuu(?int $kaisuu);

    /**
     * Get 頒布開始回数
     *
     * @return ?int
     */
    public function getScnt(): ?int;

    /**
     * Set 頒布開始回数
     *
     * @param ?int $scnt
     * @return $this
     */
    public function setScnt(?int $scnt);

    /**
     * Get 頒布希望回数
     *
     * @return ?int
     */
    public function getEcnt(): ?int;

    /**
     * Set 頒布希望回数
     *
     * @param ?int $ecnt
     * @return $this
     */
    public function setEcnt(?int $ecnt);

    /**
     * Get サイト区分
     *
     * @return ?int
     */
    public function getSitekbn(): ?int;

    /**
     * Set サイト区分
     *
     * @param ?int $sitekbn
     * @return $this
     */
    public function setSitekbn(?int $sitekbn);

    /**
     * Get 終了希望日付
     *
     * @return ?int
     */
    public function getEday(): ?int;

    /**
     * Set 終了希望日付
     *
     * @param ?int $eday
     * @return $this
     */
    public function setEday(?int $eday);

    /**
     * Get 受注日区分
     *
     * @return ?int
     */
    public function getYkbn(): ?int;

    /**
     * Set 受注日区分
     *
     * @param ?int $ykbn
     * @return $this
     */
    public function setYkbn(?int $ykbn);

    /**
     * Get 終了フラグ
     *
     * @return ?int
     */
    public function getFinflg(): ?int;

    /**
     * Set 終了フラグ
     *
     * @param ?int $finflg
     * @return $this
     */
    public function setFinflg(?int $finflg);

    /**
     * Get 終了日
     *
     * @return ?int
     */
    public function getFinday(): ?int;

    /**
     * Set 終了日
     *
     * @param ?int $finday
     * @return $this
     */
    public function setFinday(?int $finday);

    /**
     * Get 新規入力担当コード
     *
     * @return ?string
     */
    public function getTncode(): ?string;

    /**
     * Set 新規入力担当コード
     *
     * @param ?string $tncode
     * @return $this
     */
    public function setTncode(?string $tncode);

    /**
     * Get 文章コード
     *
     * @return ?int
     */
    public function getBunsyo(): ?int;

    /**
     * Set 文章コード
     *
     * @param ?int $bunsyo
     * @return $this
     */
    public function setBunsyo(?int $bunsyo);

    /**
     * Get 納品書印刷フラグ
     *
     * @return ?int
     */
    public function getNouhin(): ?int;

    /**
     * Set 納品書印刷フラグ
     *
     * @param ?int $nouhin
     * @return $this
     */
    public function setNouhin(?int $nouhin);

    /**
     * Get 初回媒体
     *
     * @return ?string
     */
    public function getBcodef(): ?string;

    /**
     * Set 初回媒体
     *
     * @param ?string $bcodef
     * @return $this
     */
    public function setBcodef(?string $bcodef);

    /**
     * Get 初回媒体管理
     *
     * @return ?string
     */
    public function getBkcodef(): ?string;

    /**
     * Set 初回媒体管理
     *
     * @param ?string $bkcodef
     * @return $this
     */
    public function setBkcodef(?string $bkcodef);

    /**
     * Get キャンペーン計算区分
     *
     * @return ?int
     */
    public function getCamflg(): ?int;

    /**
     * Set キャンペーン計算区分
     *
     * @param ?int $camflg
     * @return $this
     */
    public function setCamflg(?int $camflg);

    /**
     * Get 出荷金額なし時配送コード
     *
     * @return ?int
     */
    public function getHcode2(): ?int;

    /**
     * Set 出荷金額なし時配送コード
     *
     * @param ?int $hcode2
     * @return $this
     */
    public function setHcode2(?int $hcode2);

    /**
     * Get 出荷金額なし時入金予定コード
     *
     * @return ?int
     */
    public function getPcode2(): ?int;

    /**
     * Set 出荷金額なし時入金予定コード
     *
     * @param ?int $pcode2
     * @return $this
     */
    public function setPcode2(?int $pcode2);

    /**
     * Get 頒布種類
     *
     * @return ?int
     */
    public function getHtype(): ?int;

    /**
     * Set 頒布種類
     *
     * @param ?int $htype
     * @return $this
     */
    public function setHtype(?int $htype);

    /**
     * Get ギフトフラグ
     *
     * @return ?int
     */
    public function getGiftfg(): ?int;

    /**
     * Set ギフトフラグ
     *
     * @param ?int $giftfg
     * @return $this
     */
    public function setGiftfg(?int $giftfg);

    /**
     * Get 売上出荷区分
     *
     * @return ?int
     */
    public function getUskbn(): ?int;

    /**
     * Set 売上出荷区分
     *
     * @param ?int $uskbn
     * @return $this
     */
    public function setUskbn(?int $uskbn);

    /**
     * Get 初回お届け日
     *
     * @return ?int
     */
    public function getOtodokeday(): ?int;

    /**
     * Set 初回お届け日
     *
     * @param ?int $otodokeday
     * @return $this
     */
    public function setOtodokeday(?int $otodokeday);
}