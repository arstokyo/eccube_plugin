<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Interface for SbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface SbpscustidModelInterface extends Day\HasDayInterface
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

    /**
     * Get SBPS顧客ID
     *
     * @return ?string
     */
    public function getCustid(): ?string;

    /**
     * Set SBPS顧客ID
     *
     * @param ?string $custid
     * @return $this
     */
    public function setCustid(?string $custid): static;
}