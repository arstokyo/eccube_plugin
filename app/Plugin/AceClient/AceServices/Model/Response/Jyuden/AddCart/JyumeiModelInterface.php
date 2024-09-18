<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for JyumeiModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Jyumei\JyumeiModelGroup2Interface,
                                       Jyumei\JyumeiModelGroup3Interface,
                                       Zaiko\HasIgnoreZaikoInterface,
                                       Zaiko\HasZaikoInterface
{
    /**
     * Get 親キャンペーン区分
     *
     * @return string|null
     */
    public function getParentCkbn(): ?string;

    /**
     * Set 親キャンペーン区分
     *
     * @param string|null $parentCkbn
     * @return $this
     */
    /** @SerializedName("PARENT_CKBN") */
    public function setParentCkbn(?string $parentckbn);
}