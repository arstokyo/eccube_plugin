<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

use DateTime;
use Plugin\AceClient\Exception\DataTypeMissMatchException;

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
    public static function makeAceDateTime($dateTime, string $targetNormalizeFormat = self::ACE_DEFAULT_DATE_FORMAT): ?AceDateTimeInterface
    {
        if (empty($dateTime)) {
            return null;
        }

        if (!(is_string($dateTime) || $dateTime instanceof DateTime)) {
            throw new DataTypeMissMatchException(sprintf('The dateTime must be a string or an instance of %s', DateTime::class));
        };

        return new AceDateTime($dateTime, $targetNormalizeFormat);
    }
}