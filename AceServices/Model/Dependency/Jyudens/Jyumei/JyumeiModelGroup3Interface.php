<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for JyumeiModelGroup3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelGroup3Interface extends Good\HasSubNameInterface,
                                             Good\HasGkbnInterface,
                                             NoCategory\HasTwoImagesInterface,
                                             Cost\Tanka\HasNineTankaInterface
{
    /**
     * Get 区分
     * 
     * @return ?int
     */
    public function getKbn(): ?int;

    /**
     * Set 区分
     * 
     * @param ?int $kbn
     */
    public function setKbn(?int $kbn);

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