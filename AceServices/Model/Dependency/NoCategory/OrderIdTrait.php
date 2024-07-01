<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Order ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OrderIdTrait
{
    /**
     * Order ID
     * 
     * @var string|null
     */
    protected ?string $orderid = null;

    /**
     * {@inheritDoc}
     */
    public function getOrderid(): ?string
    {
        return $this->orderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderid(?string $orderid)
    {
        $this->orderid = $orderid;
        return $this;
    }
}