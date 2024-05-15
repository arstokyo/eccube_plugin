<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for Has ギフトNo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGiftNoInterface
{
    /**
     * Get ギフトNo
     *
     * @return ?int
     */
    public function getGiftNo(): ?int;

    /**
     * Set ギフトNo
     *
     * @param ?int $giftno
     */
    public function setGiftNo(?int $giftno);
}