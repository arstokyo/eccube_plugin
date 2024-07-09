<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
     * Get Goods
     *
     * @return GoodsModel[]|null
     */
    public function getGoods(): ?array;

    /**
     * Set Goods
     *
     * @param GoodsModel[]|null $goods
     * @return void
     */
    public function setGoods(?array $goods): void;
}