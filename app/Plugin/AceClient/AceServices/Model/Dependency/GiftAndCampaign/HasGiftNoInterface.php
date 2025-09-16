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
     *
     * @return $this
     */
    public function setGiftNo(?int $giftno);
}
