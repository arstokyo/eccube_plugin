<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka;

use Plugin\AceClient43\AceServices\Model\Dependency\Good\HasGdidInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko\HasZaikoInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

interface V1GoodsItemsTankaModelInterface extends HasZaikoInterface, HasGdidInterface, AsListDenormalizableInterface
{
    /**
     * @return GoodsTankaModel[]
     */
    public function getTanka(): array;

    /**
     * @param GoodsTankaModel[] $tanka
     */
    public function setTanka(array $tanka): static;

    public function getExtras(): ExtrasModel;

    /**
     * @SerializedName("_EXTRAS_")
     *
     * @param ExtrasModel $extras
     */
    public function setExtras(ExtrasModel $extras): static;
}
