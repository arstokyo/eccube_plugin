<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

use \Traversable;

/**
 * Interface AceDateTimeInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AceDateTimeInterface
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
     * Convert to Eccube DateTime
     * 
     * @return string
     */
    public function toEccubeDateTime(): string;

    /**
     * Convert to API DateTime
     * 
     * @return string
     */
    public function toApiDateTime(): string;

}