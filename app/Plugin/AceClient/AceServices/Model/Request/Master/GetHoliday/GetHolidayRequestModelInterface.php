<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface GetHoliday Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHolidayRequestModelInterface extends RequestModelInterface
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
    public function setSyid(?int $syid);

    /**
     * Get 開始日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getStartday();

    /**
     * Set 開始日
     *
     * @param \DateTime|string|null $startday
     * @return $this
     */
    public function setStartday($startday);

    /**
     * Get 終了日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getEndday();

    /**
     * Set 終了日
     *
     * @param \DateTime|string|null $endday
     * @return $this
     */
    public function setEndday($endday);

    /**
     * Get 倉庫ID
     *
     * @return ?string
     */
    public function getSkid(): ?string;

    /**
     * Set 倉庫ID
     *
     * @param ?string $skid
     * @return $this
     */
    public function setSkid(?string $skid);
}
