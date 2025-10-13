<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka;

class V1GoodsItemsTankaResponseModel implements V1GoodsItemsTankaResponseModelInterface
{
    /** @var V1GoodsItemsTankaModelInterface[] */
    private array $Items = [];

    /** @var int 総ヒット件数 */
    private int $total_hit = 0;

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

    public static function fetchAsListProperty(): array
    {
        return [
            'Items' => V1GoodsItemsTankaModel::class,
        ];
    }
}
