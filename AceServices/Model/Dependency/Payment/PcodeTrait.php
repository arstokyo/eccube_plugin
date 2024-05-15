<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Payment;

/**
 * Trait for Pcode
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PcodeTrait
{
    /** @var ?string $pcode 支払予定方法コード */
    protected ?string $pcode = null;

    /**
     * {@inheritDoc}
     */
    public function getPcode(): ?string
    {
        return $this->pcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcode(?string $pcode)
    {
        $this->pcode = $pcode;
        return $this;
    }
}