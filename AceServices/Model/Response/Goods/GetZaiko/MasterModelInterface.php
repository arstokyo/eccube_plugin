<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Good\GoodModelGroup4;


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
     * @return GoodModelGroup4|null
     */
    public function getGoods(): ?GoodModelGroup4;

    /**
     * Set Goods
     *
     * @param GoodModelGroup4|null $goods
     * @return void
     */
    public function setGoods(GoodModelGroup4|null $goods): void;
}