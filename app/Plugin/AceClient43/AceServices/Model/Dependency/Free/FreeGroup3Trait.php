<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;


/**
 * Trait For FreeGroup3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeGroup3Trait
{
    /** @var ?int $frkbn ファイル区分 */
    protected ?int $frkbn = null;

    /** @var ?string $frkey キー情報 */
    protected ?string $frkey = null;

    /** @var ?int $fmkbn フリー項目区分 */
    protected ?int $fmkbn = null;

    /** @var ?string $free フリー内容 */
    protected ?string $free = null;

    /**
     * {@inheritDoc}
     */
    public function getFrkbn(): ?int
    {
        return $this->frkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrkbn(?int $frkbn)
    {
        $this->frkbn = $frkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrkey(): ?string
    {
        return $this->frkey;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrkey(?string $frkey)
    {
        $this->frkey = $frkey;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFmkbn(): ?int
    {
        return $this->fmkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmkbn(?int $fmkbn)
    {
        $this->fmkbn = $fmkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree(): ?string
    {
        return $this->free;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree(?string $free)
    {
        $this->free = $free;
        return $this;
    }
}