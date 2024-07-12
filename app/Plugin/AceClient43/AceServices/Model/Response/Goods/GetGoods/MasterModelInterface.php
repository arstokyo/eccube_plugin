<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model;


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
     * @return Model\Dependency\Good\GoodModelGroup1[]|null
     */
    public function getGoods(): ?array;

    /**
     * Set Goods
     *
     * @param Model\Dependency\Good\GoodModelGroup1[]|null $goods
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
     * @return void
     */
    public function setGtanka(?array $gtanka): void;
}