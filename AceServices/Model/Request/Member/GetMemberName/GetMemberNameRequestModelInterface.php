<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetMemberName Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberNameRequestModelInterface extends RequestModelInterface
{
    /**
     * Get 通販AceシステムID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceシステムID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid);

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