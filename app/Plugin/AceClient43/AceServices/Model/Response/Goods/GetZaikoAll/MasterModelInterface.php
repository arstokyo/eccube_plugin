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
     * @return GoodModel[]|null
     */
    public function getGoods(): ?array;

    /**
     * Set Goods
     *
     * @param GoodModel[]|null $goods
     *
     * @return void
     */
    public function setGoods(?array $goods): void;
}
