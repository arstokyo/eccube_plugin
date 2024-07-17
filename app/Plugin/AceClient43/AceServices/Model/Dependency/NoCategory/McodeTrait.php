<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 顧客コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait McodeTrait
{
    /** @var ?string $mcode 顧客コード */
    protected ?string $mcode = null;

    /**
     * {@inheritDoc}
     */
    public function getMcode(): ?string
    {
        return $this->mcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setMcode(?string $mcode)
    {
        $this->mcode = $mcode;
        return $this;
    }
}