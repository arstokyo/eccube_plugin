<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberFree Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberFreeRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasIdInterface
{
    /**
     * Get 顧客ID
     *
     * @return string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param string $mbid
     */
    public function setMbid(?string $mbid);
}
