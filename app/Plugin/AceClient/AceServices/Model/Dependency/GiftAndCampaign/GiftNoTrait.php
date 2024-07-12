<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Trait for GiftNo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GiftNoTrait
{
    /** @var ?int $giftno ギフトNo */
    protected ?int $giftno = null;

    /**
     * {@inheritDoc}
     */
    public function getGiftNo(): ?int
    {
        return $this->giftno;
    }

    /**
     * {@inheritDoc}
     */
    public function setGiftNo(?int $giftno)
    {
        $this->giftno = $giftno;
        return $this;
    }
}
