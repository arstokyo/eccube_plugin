<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

use Plugin\AceClient43\Exception\DataTypeMissMatchException;

/**
 * Factory for AceDateTime
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTimeFactory
{
    public const ACE_DEFAULT_DATE_FORMAT = 'Ymd';
    public const ASIAN_TOKYO_TIMEZONE = 'Asia/Tokyo';

    /**
     * Make new AceDateTime object
     *
     * @param \DateTime|string|null $dateTime
     * @param string $targetNormalizeFormat
     *
     * @return AceDateTimeInterface|null
     */
    public static function makeAceDateTime($dateTime, string $targetNormalizeFormat = self::ACE_DEFAULT_DATE_FORMAT): ?AceDateTimeInterface
    {
        if (empty($dateTime)) {
            return null;
        }

        if (!(is_string($dateTime) || $dateTime instanceof \DateTimeInterface)) {
            throw new DataTypeMissMatchException(sprintf('The dateTime must be a string or an instance of %s', \DateTime::class));
        }

        return new AceDateTime($dateTime, $targetNormalizeFormat);
    }
}
