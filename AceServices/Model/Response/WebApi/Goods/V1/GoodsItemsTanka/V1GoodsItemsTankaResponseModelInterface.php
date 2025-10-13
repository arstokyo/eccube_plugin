<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface V1GoodsItemsTankaResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return V1GoodsItemsTankaModelInterface[]
     */
    public function getItems(): array;

    /**
     * @param V1GoodsItemsTankaModelInterface[] $items
     */
    public function setItems(array $items): self;

    public function getTotalHit(): int;

    public function setTotalHit(int $totalHit): self;
}
