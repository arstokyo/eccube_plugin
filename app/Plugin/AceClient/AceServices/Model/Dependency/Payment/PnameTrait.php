<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Payment;

/**
 * Trait for Pname
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PnameTrait
{
    /** @var ?string $pname 支払予定方法 */
    protected ?string $pname = null;

    /**
     * {@inheritDoc}
     */
    public function getPname(): ?string
    {
        return $this->pname;
    }

    /**
     * {@inheritDoc}
     */
    public function setPname(?string $pname)
    {
        $this->pname = $pname;
        return $this;
    }
}