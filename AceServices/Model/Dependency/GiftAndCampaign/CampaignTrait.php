<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Trait for キャンペーン動作フラグ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait CampaignTrait 
{
    /**
     * キャンペーン動作フラグ
     * 
     * @var int|null
     */
    protected ?int $campaign = null;

    /**
     * {@inheritDoc}
     */
    public function getCampaign(): ?int
    {
        return $this->campaign;
    }

    /**
     * {@inheritDoc}
     */
    public function setCampaign(int|null $campaign): static
    {
        $this->campaign = $campaign;
        return $this;
    }
}