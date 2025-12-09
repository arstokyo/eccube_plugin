<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsList;

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;

class V1GoodsListItemsModel extends GoodModelGroup1 implements V1GoodsListItemsInterface
{
    /** @var GoodTankaModelGroup1Interface[] */
    protected array $tanka = [];

    protected ExtrasModel $extras;

    /**
     * @return GoodTankaModelGroup1Interface[]
     */
    public function getTanka(): array
    {
        return $this->tanka;
    }

    /**
     * @param GoodTankaModelGroup1Interface[] $tanka
     */
    public function setTanka(array $tanka): self
    {
        $this->tanka = $tanka;

        return $this;
    }

    public function getExtras(): ExtrasModel
    {
        return $this->extras;
    }

    public function setExtras(ExtrasModel $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Tanka' => GoodsTankaModel::class,
        ];
    }
}
