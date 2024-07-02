<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetSbpsCustIdRequestModelInterface extends RequestModelInterface
{
    /**
     * Get 通販AceID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid): static;

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
     * @return $this
     */
    public function setMbid(?string $mbid): static;
}