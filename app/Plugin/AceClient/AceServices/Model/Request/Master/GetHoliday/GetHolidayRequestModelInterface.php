<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetHoliday Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHolidayRequestModelInterface extends RequestModelInterface,
                                                  NoCategory\HasSyidInterface
{
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
