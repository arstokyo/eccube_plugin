<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

/**
 * Interface For Baitai has two values
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBaitaiCodeInterface
{
    /**
     * Get 媒体
     * 
     * @return ?string
     */
    public function getBaitai(): ?string;

    /**
     * Set 媒体
     * 
     * @param ?string $baitai
     * @return self
     */
    public function setBaitai(?string $baitai): self;

   
    /**
     * Get 管理番号
     * 
     * @return ?string
     */
    public function getBaifile(): ?string;

    /**
     * Set 管理番号
     * 
     * @param ?string $baifile
     * @return self
     */
    public function setBaifile(?string $baifile): self;

}