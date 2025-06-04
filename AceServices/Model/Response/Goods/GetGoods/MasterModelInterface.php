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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Goods
     *
     * @return Model\Dependency\Good\GoodModelGroup1[]|null
     */
    public function getGoods(): ?array;

    /**
     * Set Goods
     *
     * @param Model\Dependency\Good\GoodModelGroup1[]|null $goods
     *
     * @return void
     */
    public function setGoods(?array $goods): void;

    /**
     * Get Gtanka
     *
     * @return Model\Dependency\Good\GoodTankaModelGroup1[]|null
     */
    public function getGtanka(): ?array;

    /**
     * Set Gtanka
     *
     * @param Model\Dependency\Good\GoodTankaModelGroup1[]|null $gtanka
     *
     * @return void
     */
    public function setGtanka(?array $gtanka): void;
}
