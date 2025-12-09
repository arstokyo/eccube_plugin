<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsList;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface V1GoodsListResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return V1GoodsListItemsInterface[]
     */
    public function getItems(): array;

    /**
     * @param V1GoodsListItemsInterface[] $items
     */
    public function setItems(array $items): self;

    public function getTotalHit(): int;

    public function setTotalHit(int $totalHit): self;

    /** 1ページ件数 */
    public function getLimit(): int;

    public function setLimit(int $limit): self;

    /** 次ページが存在するかどうか */
    public function getHasMore(): bool;

    public function setHasMore(bool $hasMore): self;
}
