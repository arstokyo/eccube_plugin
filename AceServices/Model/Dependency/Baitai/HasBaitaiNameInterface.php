<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface For BaitaiName has two values
 *
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
     * @return $this
     */
    #[SerializedName('baitai_name')]
    public function setBaitaiName(?string $baitaiName): static;

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
     * @return $this
     */
    #[SerializedName('baifile_name')]
    public function setBaifileName(?string $baifileName): static;
}