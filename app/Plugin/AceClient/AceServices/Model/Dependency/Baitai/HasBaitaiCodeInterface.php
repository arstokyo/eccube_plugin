<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Interface For Baitai has two values
 *
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
     * @return $this
     */
    public function setBaitai(?string $baitai);

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
     * @return $this
     */
    public function setBaifile(?string $baifile);
}