<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Trait for GiftNo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GiftNoTrait
{
    /** @var ?string $giftno ギフトNo */
    protected ?string $giftno = null;

    /**
     * {@inheritDoc}
     */
    public function getGiftNo(): ?string
    {
        return $this->giftno;
    }

    /**
     * {@inheritDoc}
     */
    public function setGiftNo(?string $giftno)
    {
        $this->giftno = $giftno;
        return $this;
    }
}
