<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Factory for AceDateTime
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTimeFactory
{
    /**
     * Make new AceDateTime object
     * 
     * @param string|int|\Datetime|null $dateTime
     * @return AceDateTimeInterface
     */
    public static function makeAceDateTime(string|int|\Datetime|null $dateTime, string $format = AceDateTime::ACE_DATE_FORMAT): AceDateTimeInterface|null
    {
        if (empty($dateTime)) {
            return null;
        }
        return new AceDateTime($dateTime, $format);
    }
}