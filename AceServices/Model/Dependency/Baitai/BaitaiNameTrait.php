<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Trait for 媒体名称
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaitaiNameTrait
{
    /** @var ?string $baitaiName 媒体名称 */
    #[SerializedName('baitai_name')]
    protected ?string $baitaiName = null;

    /** @var ?string $baifileName 管理番号名称 */
    #[SerializedName('baifile_name')]
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
     */
    public function setBaitaiName(?string $baitaiName): static
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
     */
    public function setBaifileName(?string $baifileName): static
    {
        $this->baifileName = $baifileName;
        return $this;
    }
}