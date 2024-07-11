<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for SBPS顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait CustidTrait
{
    /** @var ?string $custid SBPS顧客ID */
    protected ?string $custid = null;

    /**
     * {@inheritDoc}
     */
    public function getCustid(): ?string
    {
        return $this->custid;
    }

    /**
     * {@inheritDoc}
     */
    public function setCustid(?string $custid)
    {
        $this->custid = $custid;
        return $this;
    }
}