<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsList;

class V1GoodsListResponseModel implements V1GoodsListResponseModelInterface
{
    /** @var V1GoodsListItemsInterface[] */
    private array $Items = [];
    private int $total_hit = 0;
    private bool $hasMore = false;
    private int $limit = 100;

    public function getItems(): array
    {
        return $this->Items;
    }

    public function setItems(array $items): self
    {
        $this->Items = $items;

        return $this;
    }

    public function getTotalHit(): int
    {
        return $this->total_hit;
    }

    public function setTotalHit(int $totalHit): self
    {
        $this->total_hit = $totalHit;

        return $this;
    }

    /** 次ページが存在するかどうかを取得 */
    public function getHasMore(): bool
    {
        return $this->hasMore;
    }

    /** 次ページが存在するかどうかを設定 */
    public function setHasMore(bool $hasMore): self
    {
        $this->hasMore = $hasMore;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Items' => V1GoodsListItemsModel::class,
        ];
    }


    /** 1ページ件数を取得 */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /** 1ページ件数を設定 */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }
}
