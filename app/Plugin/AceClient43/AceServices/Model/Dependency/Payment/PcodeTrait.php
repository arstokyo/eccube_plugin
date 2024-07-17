<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Payment;

/**
 * Trait for Pcode
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PcodeTrait
{
    /** @var ?int $pcode 支払予定方法コード */
    protected ?int $pcode = null;

    /**
     * {@inheritDoc}
     */
    public function getPcode(): ?int
    {
        return $this->pcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcode(?int $pcode)
    {
        $this->pcode = $pcode;
        return $this;
    }
}