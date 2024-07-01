<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInterface extends NoCategory\HasPassWdInterface
{

    /**
     * Get 顧客ID
     *
     * @return ?string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param ?string $mbid
     */
    public function setMbid(?string $mbid);
}