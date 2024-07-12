<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Interface for JyumeiModelGroup3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelGroup3Interface extends Good\HasSubNameInterface,
                                             Good\HasGkbnInterface,
                                             NoCategory\HasTwoImagesInterface,
                                             Cost\Tanka\HasNineTankaInterface,
                                             NoCategory\HasKbnInterface
{
    /**
     * Get 詳細メッセージ
     * 
     * @return ?string
     */
    public function getDetailmsg(): ?string;

    /**
     * Set 詳細メッセージ
     * 
     * @param ?string $detailmsg
     */
    public function setDetailmsg(?string $detailmsg);

}