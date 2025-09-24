<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Master\V1\GetFreeCode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\CountTrait;

class V1GetFreeCodeResponseModel implements V1GetFreeCodeResponseModelInterface
{
    use CountTrait;

    protected array $items = [];

    /**
     * @return array|V1GetFreeCodeItemModel[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param V1GetFreeCodeItemModel[] $items
     *
     * @return $this
     */
    public function setItems(array $items): static
    {
        $this->items = $items;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Items' => V1GetFreeCodeItemModel::class,
        ];
    }
}
