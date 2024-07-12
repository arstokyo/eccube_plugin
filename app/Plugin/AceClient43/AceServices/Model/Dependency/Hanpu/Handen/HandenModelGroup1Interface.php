<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Interface for HandenModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelGroup1Interface
{
    /**
     * Get サイト
     *
     * @return ?int
     */
    public function getSite(): ?int;

    /**
     * Set サイト
     *
     * @param ?int $site
     * @return $this
     */
    public function setSite(?int $site);

    /**
     * Get ２回目以降出荷固定日
     *
     * @return ?int
     */
    public function getSdd(): ?int;

    /**
     * Set ２回目以降出荷固定日
     *
     * @param ?int $sdd
     * @return $this
     */
    public function setSdd(?int $sdd);

    /**
     * Get 週指定
     *
     * @return ?int
     */
    public function getWeeksite(): ?int;

    /**
     * Set 週指定
     *
     * @param ?int $weeksite
     * @return $this
     */
    public function setWeeksite(?int $weeksite);

    /**
     * Get 曜日指定
     *
     * @return ?int
     */
    public function getWeekday(): ?int;

    /**
     * Set 曜日指定
     *
     * @param ?int $weekday
     * @return $this
     */
    public function setWeekday(?int $weekday);

    /**
     * Get 2回目以降お届け日
     *
     * @return ?int
     */
    public function getOtodokedd(): ?int;

    /**
     * Set 2回目以降お届け日
     *
     * @param ?int $otodokedd
     * @return $this
     */
    public function setOtodokedd(?int $otodokedd);

    /**
     * Get 週指定
     *
     * @return ?int
     */
    public function getOtodokewsite(): ?int;

    /**
     * Set 週指定
     *
     * @param ?int $otodokewsite
     * @return $this
     */
    public function setOtodokewsite(?int $otodokewsite);

    /**
     * Get 曜日指定
     *
     * @return ?int
     */
    public function getOtodokewday(): ?int;

    /**
     * Set 曜日指定
     *
     * @param ?int $otodokewday
     * @return $this
     */
    public function setOtodokewday(?int $otodokewday);

}