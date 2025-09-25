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
     *
     * @return $this
     */
    public function setCampaign(?int $campaign);
}
