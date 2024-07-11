<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait For Freememo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeMemoTrait
{
    use NoCategory\KubunTrait;

    /** @var ?string $foid フリーマスタID */
    protected ?string $foid = null;

    /** @var ?string $memo メモ */
    protected ?string $memo = null;

    /**
     * {@inheritDoc}
     */
    public function getFoid(): ?string
    {
        return $this->foid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFoid(?string $foid)
    {
        $this->foid = $foid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemo(?string $memo)
    {
        $this->memo = $memo;
        return $this;
    }
}