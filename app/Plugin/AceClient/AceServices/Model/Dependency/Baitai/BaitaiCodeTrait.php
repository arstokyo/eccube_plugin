<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;


/**
 * Trait for 媒体コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaitaiCodeTrait
{
    /** @var ?string $baitai 媒体 */
    protected ?string $baitai = null;

    /** @var ?string $baifile 管理番号 */
    protected ?string $baifile = null;

    /**
     * {@inheritDoc}
     */
    public function getBaitai(): ?string
    {
        return $this->baitai;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaitai(?string $baitai): parent
    {
        $this->baitai = $baitai;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBaifile(): ?string
    {
        return $this->baifile;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaifile(?string $baifile): parent
    {
        $this->baifile = $baifile;
        return $this;
    }
}