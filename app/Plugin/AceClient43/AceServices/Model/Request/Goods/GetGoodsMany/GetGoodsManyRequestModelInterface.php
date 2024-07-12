<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
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
    /** @SerializedName("ID") */
    public function setId(?int $id);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("Souko") */
    public function setSouko(?string $souko);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("Gcode") */
    public function setGcode(?string $gcode);
}