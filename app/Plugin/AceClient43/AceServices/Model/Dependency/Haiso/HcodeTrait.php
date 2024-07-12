<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HcodeTrait
{
    /** @var ?int $hcode 配送方法コード */
    protected ?int $hcode = null;

    /**
     * {@inheritDoc}
     */
    public function getHcode(): ?int
    {
        return $this->hcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setHcode(?int $hcode)
    {
        $this->hcode = $hcode;
        return $this;
    }
}