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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface For FreeCd
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeCdInterface extends NoCategory\HasNameInterface, Bikou\HasThreeNotesInterface, NoCategory\HasKubunInterface
{
    /**
     * Get フリーマスタID
     *
     * @return ?string
     */
    public function getFcid(): ?string;

    /**
     * Set フリーマスタID
     *
     * @param ?string $fcid
     *
     * @return $this
     */
    public function setFcid(?string $fcid);
}
