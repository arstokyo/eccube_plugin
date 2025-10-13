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

namespace Plugin\AceClient43\Util\Converter;

/**
 * Class NumberConverter
 *
 * Utility to normalize DateTime values to a canonical representation
 * so Doctrine does not detect false-positive changes (e.g. due to microseconds).
 *
 * - Preserves timezone information from the input.
 * - Truncates microseconds to seconds precision.
 * - Supports DateTimeInterface, string, and null.
 *
 * @author Ars-Thong
 */
class DateTimeConverter
{
    /**
     * Normalize a datetime value to seconds precision while preserving timezone.
     *
     * @param \DateTimeInterface|string|null $value
     * @return \DateTime|null
     * @throws \Exception
     */
    public static function normalize($value): ?\DateTime
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof \DateTimeInterface) {
            // If already normalized (no microseconds) and is mutable DateTime, reuse the same instance to keep identity.
            if ($value instanceof \DateTime && $value->format('u') === '000000') {
                return $value;
            }
            // Otherwise, create a new DateTime at seconds precision with the original timezone object.
            $tz = $value->getTimezone();
            return new \DateTime($value->format('Y-m-d H:i:s'), $tz);
        }

        if (is_string($value)) {
            // Parse string, then normalize to seconds precision preserving the parsed timezone object.
            $dt = new \DateTime($value);
            $tz = $dt->getTimezone();
            return new \DateTime($dt->format('Y-m-d H:i:s'), $tz);
        }

        throw new \InvalidArgumentException('Unsupported value for DateTime normalization');
    }

    /**
     * Compare two DateTimeInterface values by second precision and timezone name.
     *
     * @param \DateTimeInterface|null $a
     * @param \DateTimeInterface|null $b
     * @return bool
     */
    public static function isSame($a, $b): bool
    {
        if ($a === $b) {
            return true;
        }
        if (!$a instanceof \DateTimeInterface || !$b instanceof \DateTimeInterface) {
            return false;
        }

        // Same second and same timezone identifier (e.g., "Asia/Tokyo")
        return $a->format('Y-m-d H:i:s') === $b->format('Y-m-d H:i:s')
            && $a->getTimezone()->getName() === $b->getTimezone()->getName();
    }

}
