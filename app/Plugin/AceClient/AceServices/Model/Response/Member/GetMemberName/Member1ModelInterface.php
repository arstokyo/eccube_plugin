<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;


/**
 * Interface for Member1Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface Member1ModelInterface extends NoCategory\HasNameInterface
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