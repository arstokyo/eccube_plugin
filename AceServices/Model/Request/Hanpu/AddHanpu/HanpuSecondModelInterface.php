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

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen\HandenModelGroup1Interface;

/**
 * Interface HanpuSecondModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuSecondModelInterface extends HandenModelGroup1Interface
{
    /**
     * Get サイト(日単位)
     *
     * @return ?int
     */
    public function getSiteday(): ?int;

    /**
     * Set サイト(日単位)
     *
     * @param ?int $siteday
     *
     * @return $this
     */
    public function setSiteday(?int $siteday);
}
