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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodsModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Goods
     *
     * @return GoodModel[]|null
     */
    public function getGood(): ?array;

    /**
     * Set Goods
     *
     * @param GoodModel[]|null $good
     *
     * @return void
     */
    /** @SerializedName("Goods") */
    public function setGood(?array $good): void;
}
