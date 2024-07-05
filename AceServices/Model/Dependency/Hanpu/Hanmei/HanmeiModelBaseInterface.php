<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for HanmeiModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanmeiModelBaseInterface extends NoCategory\HasEdaInterface,
                                           Good\HasGcodeInterface,
                                           NoCategory\HasSuuInterface,
                                           Cost\Tanka\HasTankaInterface
{
    /**
     * Get 更新区分
     *
     * @return ?int
     */
    public function getKousin(): ?int;

    /**
     * Set 更新区分
     *
     * @param ?int $kousin
     * @return $this
     */
    public function setKousin(?int $kousin): static;

    /**
     * Get 明細サイト
     *
     * @return ?int
     */
    public function getKsite(): ?int;

    /**
     * Set 明細サイト
     *
     * @param ?int $ksite
     * @return $this
     */
    public function setKsite(?int $ksite): static;
}