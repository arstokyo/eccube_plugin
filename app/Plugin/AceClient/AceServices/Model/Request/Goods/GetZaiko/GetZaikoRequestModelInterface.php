<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaiko;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface GetZaikoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetZaikoRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    Souko\HasSoukoInterface,
                                                    Good\HasGdidInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("skid") */
    public function setSouko(?string $souko);
}