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
     * @return Model\Dependency\Good\GoodModelGroup3[]|null
     */
    public function getGood(): ?array;

    /**
     * Set Goods
     *
     * @param Model\Dependency\Good\GoodModelGroup3[]|null $good
     * @return void
     */
    #[SerializedName('Goods')]
    public function setGood(array|null $good): void;
}