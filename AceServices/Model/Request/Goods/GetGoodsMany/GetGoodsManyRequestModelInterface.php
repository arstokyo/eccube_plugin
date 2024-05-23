<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetGoodsMany;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface GetGoodsManyRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsManyRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    Souko\HasSoukoInterface,
                                                    Good\HasGcodeInterface
{
    /**
     * {@inheritDoc}
     */
    #[SerializedName('ID')]
    public function setId(?int $id): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('Souko')]
    public function setSouko(?string $souko): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('Gcode')]
    public function setGcode(?string $gcode): static;
}