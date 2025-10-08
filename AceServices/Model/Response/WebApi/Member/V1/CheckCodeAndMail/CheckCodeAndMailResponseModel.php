<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

class CheckCodeAndMailResponseModel implements CheckCodeAndMailResponseModelInterface
{
    /** @var ItemModel[] */
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
            'items' => ItemModel::class,
        ];
    }
}
