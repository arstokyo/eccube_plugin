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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaikoAll;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for GoodModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelInterface extends Good\HasGdidInterface, NoCategory\HasNameInterface
{
    /**
     * Get 受注可能数
     *
     * @return ?int
     */
    public function getJsuu(): ?int;

    /**
     * Set 受注可能数
     *
     * @param ?int $jsuu
     *
     * @return $this
     */
    public function setJsuu(?int $jsuu);
}
