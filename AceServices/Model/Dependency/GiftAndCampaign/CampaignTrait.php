<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

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
    public function setCampaign(?int $campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function useCampaign($use = true): self
    {
        $this->setCampaign($use ? 1 : 0);

        return $this;
    }
}
