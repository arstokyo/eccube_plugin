<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

use DateTime;
use DateTimeZone;
use Plugin\AceClient\Exception\AceDateTimeCreateFailedException;

/**
 * Class for AceDateTime
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTime  implements AceDateTimeInterface
{

    public const ACE_DATE_FORMAT      = "Ymd";
    public const ECCUBE_DATE_FORMAT   = "Y-m-d";
    public const ASIAN_TOKYO_TIMEZONE = 'Asia/Tokyo';

    /**
     * @var Datetime $dateTime
     */
    private Datetime $dateTime;

    /**
     * @var string $format
     */
    private string $format;

    private string $defaultTimezone = self::ASIAN_TOKYO_TIMEZONE;

    /**
     * Constructor for AceDateTime
     * 
     * @param string|int|Datetime $dateTime
     * @param string $format
     * 
     * @throws AceDateTimeCreateFailedException
     */
    public function __construct(string|int|Datetime $dateTime, $format = self::ACE_DATE_FORMAT)
    {
        $this->format = $format;
        $this->dateTime = $this->createNewDateTime($dateTime, $format);
    }

    /**
     * Create new DateTime object
     * 
     * @param string|int|Datetime $dateTime
     * @param string $format
     * 
     * @throws AceDateTimeCreateFailedException
     * @return Datetime
     */
    private function createNewDateTime(string|int|Datetime $dateTime, $format): Datetime
    {
        if ($dateTime instanceof Datetime) {
            return $dateTime;
        } 

        $result = DateTime::createFromFormat($format, $dateTime);
        if ($result === false) {
            try {
                $result = new DateTime($dateTime);
            } catch (\Throwable $e) {
                throw new AceDateTimeCreateFailedException($dateTime, $e);
            }
        }

        return $result->setTimezone(new DateTimeZone($this->defaultTimezone));
    }

    /**
     * {@inheritDoc}
     */
    public function year(): string
    {
        return $this->dateTime->format('Y');
    }

    /**
     * {@inheritDoc}
     */
    public function month(): string
    {
        return $this->dateTime->format('m');
    }

    /**
     * {@inheritDoc}
     */
    public function day(): string
    {
        return $this->dateTime->format('d');
    }

    /**
     * {@inheritDoc}
     */
    public function age(): int
    {
        return (int) $this->dateTime->diff(new DateTime())->format('%y');
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeStamp(): int
    {
        return $this->dateTime->getTimestamp();
    }

    /**
     * {@inheritDoc}
     */
    public function toJapaneseLongDate(): string
    {
        return $this->dateTime->format('Y年m月d日 H時i分s秒');
    }

    /**
     * {@inheritDoc}
     */
    public function toJapaneseShortDate(): string
    {
        return $this->dateTime->format('Y年m月d日');
    }

    /**
     * {@inheritDoc}
     */
    public function toLongDate(): string
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    /**
     * {@inheritDoc}
     */
    public function toShortDate(): string
    {
        return $this->dateTime->format('Y-m-d');
    }

    /**
     * {@inheritDoc}
     */
    public function toSpecificFormat(string $format): string
    {
        return $this->dateTime->format($format);
    }

    /**
     * {@inheritDoc}
     */
    public function toApiDateTime(): string
    {
        return $this->dateTime->format($this->format);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->toLongDate();
    }

    /**
     * {@inheritDoc}
     */
    public function toDateTime(): DateTime
    {
        return $this->dateTime;
    }

}