<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetDurationOrderTotalRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDurationOrderTotalRequestModelInterface extends RequestModelInterface
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
     * Get 開始日付
     *
     * @return ?int
     */
    public function getDayfrom(): ?int;

    /**
     * Set 開始日付
     *
     * @param ?int $dayfrom
     * @return $this
     */
    public function setDayfrom(?int $dayfrom): static;

    /**
     * Get 終了日付
     *
     * @return ?int
     */
    public function getDayto(): ?int;

    /**
     * Set 終了日付
     *
     * @param ?int $dayto
     * @return $this
     */
    public function setDayto(?int $dayto): static;
}