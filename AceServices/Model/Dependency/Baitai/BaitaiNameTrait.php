<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体名称
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaitaiNameTrait
{
    /** @var ?string $baitaiName 媒体名称 */
    protected ?string $baitaiName = null;

    /** @var ?string $baifileName 管理番号名称 */
    protected ?string $baifileName = null;

    /**
     * {@inheritDoc}
     */
    public function getBaitaiName(): ?string
    {
        return $this->baitaiName;
    }

    /**
     * {@inheritDoc}
     *  @\Symfony\Component\Serializer\Annotation\SerializedName("baitai_name")
     */
    public function setBaitaiName(?string $baitaiName)
    {
        $this->baitaiName = $baitaiName;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBaifileName(): ?string
    {
        return $this->baifileName;
    }

    /**
     * {@inheritDoc}
     * @\Symfony\Component\Serializer\Annotation\SerializedName("baifile_name")
     */
    public function setBaifileName(?string $baifileName)
    {
        $this->baifileName = $baifileName;
        return $this;
    }
}