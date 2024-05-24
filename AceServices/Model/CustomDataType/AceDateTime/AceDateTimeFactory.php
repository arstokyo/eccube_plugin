<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Factory for AceDateTime
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTimeFactory
{

    public const ACE_DEFAULT_DATE_FORMAT = "Ymd";
    public const ASIAN_TOKYO_TIMEZONE = 'Asia/Tokyo';

    /**
     * Make new AceDateTime object
     * 
     * @param \Datetime|string|null $dateTime
     * @param string $targetNormalizeFormat
     * 
     * @return AceDateTimeInterface|null
     */
    public static function makeAceDateTime(\Datetime|string|null $dateTime, string $targetNormalizeFormat = self::ACE_DEFAULT_DATE_FORMAT): AceDateTimeInterface|null
    {
        if (empty($dateTime)) {
            return null;
        }
        return new AceDateTime($dateTime, $targetNormalizeFormat);
    }
}