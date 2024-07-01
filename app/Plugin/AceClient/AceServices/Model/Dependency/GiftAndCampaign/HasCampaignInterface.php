<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for Has キャンペーン動作フラグ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCampaignInterface
{
    /**
     * Get キャンペーン動作フラグ
     * 
     * @return int|null
     */
    public function getCampaign(): ?int;

    /**
     * Set キャンペーン動作フラグ
     * 
     * @param int|null $campaign
     * @return $this
     */
    public function setCampaign(int|null $campaign): static;
}