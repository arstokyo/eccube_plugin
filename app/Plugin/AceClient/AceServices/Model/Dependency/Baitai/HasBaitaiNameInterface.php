<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface For BaitaiName has two values
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBaitaiNameInterface
{
    /**
     * Get 媒体名
     * 
     * @return ?string
     */
    #[SerializedName('baitai_name')]
    public function getBaitaiName(): ?string;

    /**
     * Set 媒体名
     * 
     * @param ?string $baitaiName
     * @return self
     */
    #[SerializedName('baitai_name')]
    public function setBaitaiName(?string $baitaiName): self;

    /**
     * Get 管理番号名
     * 
     * @return ?string
     */
    #[SerializedName('baifile_name')]
    public function getBaifileName(): ?string;

    /**
     * Set 管理番号名
     * 
     * @param ?string $baifileName
     * @return self
     */
    #[SerializedName('baifile_name')]
    public function setBaifileName(?string $baifileName): self;

}