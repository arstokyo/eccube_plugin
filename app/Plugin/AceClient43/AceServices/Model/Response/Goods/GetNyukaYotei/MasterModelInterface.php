<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

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