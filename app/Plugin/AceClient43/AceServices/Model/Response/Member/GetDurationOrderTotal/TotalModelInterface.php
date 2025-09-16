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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for TotalModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface TotalModelInterface extends Good\HasGkbnInterface
{
    /**
     * Get 伝票合計
     *
     * @return ?int
     */
    public function getDentotal(): ?int;

    /**
     * Set 伝票合計
     *
     * @param ?int $dentotal
     *
     * @return $this
     */
    public function setDentotal(?int $dentotal);
}
