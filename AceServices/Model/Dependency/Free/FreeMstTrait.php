<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait For Freemst
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeMstTrait
{
    use NoCategory\NameTrait,
        NoCategory\KubunTrait;

    /** @var ?int $type フリー項目タイプ */
    protected ?int $type = null;

    /** @var ?int $jyun 表示順 */
    protected ?int $jyun = null;

    /** @var ?int $reqflg 必須フラグ */
    protected ?int $reqflg = null;

    /** @var ?string $explanation 説明 */
    protected ?string $explanation = null;

    /** @var ?int $oyakubun 親フリー項目区分 */
    protected ?int $oyakubun = null;

    /** @var ?string $bgcolor バックカラー */
    protected ?string $bgcolor = null;

    /** @var ?int $rpos データ読込位置 */
    protected ?int $rpos = null;

    /** @var ?int $leng 最大文字数 */
    protected ?int $leng = null;

    /**
     * {@inheritDoc}
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(?int $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyun(): ?int
    {
        return $this->jyun;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyun(?int $jyun)
    {
        $this->jyun = $jyun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getReqflg(): ?int
    {
        return $this->reqflg;
    }

    /**
     * {@inheritDoc}
     */
    public function setReqflg(?int $reqflg)
    {
        $this->reqflg = $reqflg;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * {@inheritDoc}
     */
    public function setExplanation(?string $explanation)
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOyakubun(): ?int
    {
        return $this->oyakubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setOyakubun(?int $oyakubun)
    {
        $this->oyakubun = $oyakubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBgcolor(): ?string
    {
        return $this->bgcolor;
    }

    /**
     * {@inheritDoc}
     */
    public function setBgcolor(?string $bgcolor)
    {
        $this->bgcolor = $bgcolor;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRpos(): ?int
    {
        return $this->rpos;
    }

    /**
     * {@inheritDoc}
     */
    public function setRpos(?int $rpos)
    {
        $this->rpos = $rpos;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLeng(): ?int
    {
        return $this->leng;
    }

    /**
     * {@inheritDoc}
     */
    public function setLeng(?int $leng)
    {
        $this->leng = $leng;
        return $this;
    }
}