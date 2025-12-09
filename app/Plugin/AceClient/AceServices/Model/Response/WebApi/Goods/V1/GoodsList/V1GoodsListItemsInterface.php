<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsList;

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

interface V1GoodsListItemsInterface extends GoodModelGroup1Interface, AsListDenormalizableInterface
{
    /**
     * @return GoodTankaModelGroup1Interface[]
     */
    public function getTanka(): array;

    /**
     * @param GoodTankaModelGroup1Interface[] $tanka
     */
    public function setTanka(array $tanka): self;

    public function getExtras(): ExtrasModel;

    /**
     * @SerializedName("_EXTRAS_")
     *
     * @param ExtrasModel $extras
     */
    public function setExtras(ExtrasModel $extras): self;
}
