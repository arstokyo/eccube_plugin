<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Interface for CalendarModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CalendarModelInterface extends Day\HasDayInterface
{

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

    /**
     * Get 休日区分
     *
     * @return ?int
     */
    public function getHolkbn(): ?int;

    /**
     * Set 休日区分
     *
     * @param ?int $holkbn
     * @return $this
     */
    public function setHolkbn(?int $holkbn);

    /**
     * Get メモ
     *
     * @return ?string
     */
    public function getMemo(): ?string;

    /**
     * Set メモ
     *
     * @param ?string $memo
     * @return $this
     */
    public function setMemo(?string $memo);

    /**
     * Get 色
     *
     * @return ?string
     */
    public function getFrcolor(): ?string;

    /**
     * Set 色
     *
     * @param ?string $frcolor
     * @return $this
     */
    public function setFrcolor(?string $frcolor);

    /**
     * Get メモの表示日数
     *
     * @return ?int
     */
    public function getShowdays(): ?int;

    /**
     * Set メモの表示日数
     *
     * @param ?int $showdays
     * @return $this
     */
    public function setShowdays(?int $showdays);
}