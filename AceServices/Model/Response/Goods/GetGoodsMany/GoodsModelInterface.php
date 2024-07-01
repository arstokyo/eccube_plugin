<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient\AceServices\Model;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodsModelInterface extends HasMessageModelInterface,
                                      AsListDenormalizableInterface
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
     * @return void
     */
    /** @SerializedName("Goods") */
    public function setGood(?array $good): void;
}