<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for Has キャンペーン区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasCKbnInterface
{
    /**
     * Get キャンペーン区分
     *
     * @return ?int
     */
    public function getCKbn(): ?int;

    /**
     * Set キャンペーン区分
     *
     * @param ?int $ckbn
     * @return $this
     */
    public function setCKbn(?int $ckbn): static;
}