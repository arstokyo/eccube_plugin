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
 * Trait for CKbn
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait CKbnTrait
{
    /** @var ?int キャンペーン区分 */
    protected ?int $ckbn = null;

    /**
     * {@inheritDoc}
     */
    public function getCKbn(): ?int
    {
        return $this->ckbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setCKbn(?int $ckbn)
    {
        $this->ckbn = $ckbn;

        return $this;
    }
}
