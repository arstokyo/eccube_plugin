<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;


/**
 * Interface for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface
{
    /**
     * Get Goods
     *
     * @return GoodModel|null
     */
    public function getGoods(): ?GoodModel;

    /**
     * Set Goods
     *
     * @param GoodModel|null $goods
     * @return void
     */
    public function setGoods(?GoodModel $goods): void;
}