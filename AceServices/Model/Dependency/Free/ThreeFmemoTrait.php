<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 3つフリー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFmemoTrait 
{
    /** @var ?string $fmemo1 フリーメモ1 */
    protected ?string $fmemo1 = null;

    /** @var ?string $fmemo2 フリーメモ2 */
    protected ?string $fmemo2 = null;

    /** @var ?string $fmemo3 フリーメモ3 */
    protected ?string $fmemo3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFMemo1(): ?string
    {
        return $this->fmemo1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFMemo1(?string $fmemo1)
    {
        $this->fmemo1 = $fmemo1;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getFMemo2(): ?string
    {
        return $this->fmemo2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFMemo2(?string $fmemo2)
    {
        $this->fmemo2 = $fmemo2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFMemo3(): ?string
    {
        return $this->fmemo3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFMemo3(?string $fmemo3)
    {
        $this->fmemo3 = $fmemo3;
        return $this;
    }

}