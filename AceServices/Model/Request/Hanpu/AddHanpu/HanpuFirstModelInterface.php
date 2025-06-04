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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Interface HanpuFirstModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuFirstModelInterface extends Day\HasSdayInterface
{
    /**
     * Get 初回お届け日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getOtodokeday();

    /**
     * Set 初回お届け日
     *
     * @param \DateTime|string|null $otodokeday
     */
    public function setOtodokeday($otodokeday);
}
