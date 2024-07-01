<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/*
 * Trait for 商品ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GdidTrait
{
    /** @var ?string $gdid 商品ID */
    protected ?string $gdid = null;

    /**
     * {@inheritDoc}
     */
    public function getGdid(): ?string
    {
        return $this->gdid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGdid(?string $gdid)
    {
        $this->gdid = $gdid;
        return $this;
    }
}