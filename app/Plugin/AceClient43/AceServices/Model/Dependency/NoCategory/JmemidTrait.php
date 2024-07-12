<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 受注顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JmemidTrait
{
    /** @var ?string $jmemid 受注顧客ID */
    protected ?string $jmemid = null;

    /**
     * {@inheritDoc}
     */
    public function getJmemid(): ?string
    {
        return $this->jmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmemid(?string $jmemid)
    {
        $this->jmemid = $jmemid;
        return $this;
    }
}