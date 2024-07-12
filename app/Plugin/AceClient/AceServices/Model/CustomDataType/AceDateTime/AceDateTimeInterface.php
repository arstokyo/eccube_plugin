<?php

namespace Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface AceDateTimeInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AceDateTimeInterface extends \Stringable
{
    /**
     * Get the year
     * 
     * @return string
     */
    public function year(): string;

    /**
     * Get the month
     * 
     * @return string
     */
    public function month(): string;

    /**
     * Get the age
     * 
     * @return int
     */
    public function age(): int;

    /**
     * Get the day
     * 
     * @return string
     */
    public function day(): string;

    /**
     * Convert to short date format
     * 
     * @return string
     */
    public function toShortDate(): string;

    /**
     * Convert to long date format
     * 
     * @return string
     */
    public function toLongDate(): string;

    /**
     * Convert to Japanese short date format
     * 
     * @return string
     */
    public function toJapaneseShortDate(): string;

    /**
     * Convert to Japanese long date format
     * 
     * @return string
     */
    public function toJapaneseLongDate(): string;

    /**
     * Convert to specific date format
     * 
     * @param string $format
     * @return string
     */
    public function toSpecificFormat(string $format): string;

    /**
     * Get the timestamp
     * 
     * @return int
     */
    public function getTimeStamp(): int;

    /**
     * Convert to API DateTime
     * 
     * @return string
     */
    public function toApiDateTime(): string;

    /**
     * Convert to DateTimes
     * 
     * @return \DateTime
     */
    public function toDateTime(): \DateTime;

}