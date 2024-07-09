<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for HandenModelGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HandenModelGroup2Trait
{
    use HandenModelBaseTrait,
        Denpyo\ToriKbnTrait,
        NoCategory\McodeTrait,
        Denpyo\ScodeTrait,
        Card\CnameTrait,
        Person\Nmember\NcodeTrait,
        Person\Nmember\NadrTrait,
        Day\SdayTrait,
        OkuriAndNouhin\BunsyoTrait,
        Day\HdayTrait,
        Denpyo\MemIdTrait;

    /** @var ?int $hanpu 頒布コード */
    protected ?int $hanpu = null;

    /** @var ?string $ccode カード会社コード */
    protected ?string $ccode = null;

    /** @var ?string $cno カード番号 */
    protected ?string $cno = null;

    /** @var ?int $ckigen カード期限 */
    protected ?int $ckigen = null;

    /** @var ?int $cpay カード支払方法 */
    protected ?int $cpay = null;

    /** @var ?string $syounin カード承認番号 */
    protected ?string $syounin = null;

    /** @var ?int $kaisuu 支払回数 */
    protected ?int $kaisuu = null;

    /** @var ?int $scnt 頒布開始回数 */
    protected ?int $scnt = null;

    /** @var ?int $ecnt 頒布希望回数 */
    protected ?int $ecnt = null;

    /** @var ?int $sitekbn サイト区分 */
    protected ?int $sitekbn = null;

    /** @var ?int $eday 終了希望日付 */
    protected ?int $eday = null;

    /** @var ?int $ykbn 受注日区分 */
    protected ?int $ykbn = null;

    /** @var ?int $finflg 終了フラグ */
    protected ?int $finflg = null;

    /** @var ?int $finday 終了日 */
    protected ?int $finday = null;

    /** @var ?string $tncode 新規入力担当コード */
    protected ?string $tncode = null;

    /** @var ?int $bunsyo 文章コード */
    protected ?int $bunsyo = null;

    /** @var ?int $nouhin 納品書印刷フラグ */
    protected ?int $nouhin = null;

    /** @var ?string $bcodef 初回媒体 */
    protected ?string $bcodef = null;

    /** @var ?string $bkcodef 初回媒体管理 */
    protected ?string $bkcodef = null;

    /** @var ?int $camflg キャンペーン計算区分 */
    protected ?int $camflg = null;

    /** @var ?int $hcode2 出荷金額なし時配送コード */
    protected ?int $hcode2 = null;

    /** @var ?int $pcode2 出荷金額なし時入金予定コード */
    protected ?int $pcode2 = null;

    /** @var ?int $htype 頒布種類 */
    protected ?int $htype = null;

    /** @var ?int $giftfg ギフトフラグ */
    protected ?int $giftfg = null;

    /** @var ?int $uskbn 売上出荷区分 */
    protected ?int $uskbn = null;

    /** @var ?int $otodokeday 初回お届け日 */
    protected ?int $otodokeday = null;

    /**
     * {@inheritDoc}
     */
    public function getHanpu(): ?int
    {
        return $this->hanpu;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanpu(?int $hanpu)
    {
        $this->hanpu = $hanpu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCcode(): ?string
    {
        return $this->ccode;
    }

    /**
     * {@inheritDoc}
     */
    public function setCcode(?string $ccode)
    {
        $this->ccode = $ccode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCno(): ?string
    {
        return $this->cno;
    }

    /**
     * {@inheritDoc}
     */
    public function setCno(?string $cno)
    {
        $this->cno = $cno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCkigen(): ?int
    {
        return $this->ckigen;
    }

    /**
     * {@inheritDoc}
     */
    public function setCkigen(?int $ckigen)
    {
        $this->ckigen = $ckigen;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCpay(): ?int
    {
        return $this->cpay;
    }

    /**
     * {@inheritDoc}
     */
    public function setCpay(?int $cpay)
    {
        $this->cpay = $cpay;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSyounin(): ?string
    {
        return $this->syounin;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyounin(?string $syounin)
    {
        $this->syounin = $syounin;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKaisuu(): ?int
    {
        return $this->kaisuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKaisuu(?int $kaisuu)
    {
        $this->kaisuu = $kaisuu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getScnt(): ?int
    {
        return $this->scnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setScnt(?int $scnt)
    {
        $this->scnt = $scnt;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEcnt(): ?int
    {
        return $this->ecnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setEcnt(?int $ecnt)
    {
        $this->ecnt = $ecnt;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSitekbn(): ?int
    {
        return $this->sitekbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSitekbn(?int $sitekbn)
    {
        $this->sitekbn = $sitekbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEday(): ?int
    {
        return $this->eday;
    }

    /**
     * {@inheritDoc}
     */
    public function setEday(?int $eday)
    {
        $this->eday = $eday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getYkbn(): ?int
    {
        return $this->ykbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setYkbn(?int $ykbn)
    {
        $this->ykbn = $ykbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFinflg(): ?int
    {
        return $this->finflg;
    }

    /**
     * {@inheritDoc}
     */
    public function setFinflg(?int $finflg)
    {
        $this->finflg = $finflg;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFinday(): ?int
    {
        return $this->finday;
    }

    /**
     * {@inheritDoc}
     */
    public function setFinday(?int $finday)
    {
        $this->finday = $finday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBunsyo(): ?int
    {
        return $this->bunsyo;
    }

    /**
     * {@inheritDoc}
     */
    public function setBunsyo(?int $bunsyo)
    {
        $this->bunsyo = $bunsyo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTncode(): ?string
    {
        return $this->tncode;
    }

    /**
     * {@inheritDoc}
     */
    public function setTncode(?string $tncode)
    {
        $this->tncode = $tncode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNouhin(): ?int
    {
        return $this->nouhin;
    }

    /**
     * {@inheritDoc}
     */
    public function setNouhin(?int $nouhin)
    {
        $this->nouhin = $nouhin;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBcodef(): ?string
    {
        return $this->bcodef;
    }

    /**
     * {@inheritDoc}
     */
    public function setBcodef(?string $bcodef)
    {
        $this->bcodef = $bcodef;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBkcodef(): ?string
    {
        return $this->bkcodef;
    }

    /**
     * {@inheritDoc}
     */
    public function setBkcodef(?string $bkcodef)
    {
        $this->bkcodef = $bkcodef;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCamflg(): ?int
    {
        return $this->camflg;
    }

    /**
     * {@inheritDoc}
     */
    public function setCamflg(?int $camflg)
    {
        $this->camflg = $camflg;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHcode2(): ?int
    {
        return $this->hcode2;
    }

    /**
     * {@inheritDoc}
     */
    public function setHcode2(?int $hcode2)
    {
        $this->hcode2 = $hcode2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPcode2(): ?int
    {
        return $this->pcode2;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcode2(?int $pcode2)
    {
        $this->pcode2 = $pcode2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHtype(): ?int
    {
        return $this->htype;
    }

    /**
     * {@inheritDoc}
     */
    public function setHtype(?int $htype)
    {
        $this->htype = $htype;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGiftfg(): ?int
    {
        return $this->giftfg;
    }

    /**
     * {@inheritDoc}
     */
    public function setGiftfg(?int $giftfg)
    {
        $this->giftfg = $giftfg;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUskbn(): ?int
    {
        return $this->uskbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setUskbn(?int $uskbn)
    {
        $this->uskbn = $uskbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtodokeday(): ?int
    {
        return $this->otodokeday;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtodokeday(?int $otodokeday)
    {
        $this->otodokeday = $otodokeday;
        return $this;
    }
}