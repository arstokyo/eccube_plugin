<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItems;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface V1GoodsItemsResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return V1GoodsItemsInterface[]
     */
    public function getItems(): array;

    /**
     * @param V1GoodsItemsInterface[] $items
     */
    public function setItems(array $items): self;

    public function getTotalHit(): int;

    public function setTotalHit(int $totalHit): self;
}
