<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka;

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GdidTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko\ZaikoTrait;

class V1GoodsItemsTankaModel implements V1GoodsItemsTankaModelInterface
{
    use GdidTrait;
    use ZaikoTrait;

    /** @var GoodsTankaModel[] */
    protected array $tanka = [];

    protected ExtrasModel $extras;

    /**
     * @return GoodsTankaModel[]
     */
    public function getTanka(): array
    {
        return $this->tanka;
    }

    /**
     * @param GoodsTankaModel[] $tanka
     */
    public function setTanka(array $tanka): static
    {
        $this->tanka = $tanka;

        return $this;
    }

    public function getExtras(): ExtrasModel
    {
        return $this->extras;
    }

    public function setExtras(ExtrasModel $extras): static
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
