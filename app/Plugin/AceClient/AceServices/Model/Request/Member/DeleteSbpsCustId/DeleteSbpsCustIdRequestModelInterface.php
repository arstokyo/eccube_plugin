<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface DeleteSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DeleteSbpsCustIdRequestModelInterface extends RequestModelInterface
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

    /**
     * Get SBPS顧客枝番
     *
     * @return ?string
     */
    public function getCeda(): ?string;

    /**
     * Set SBPS顧客枝番
     *
     * @param ?string $ceda
     * @return $this
     */
    public function setCeda(?string $ceda): static;
}