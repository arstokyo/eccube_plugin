<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

use DateTime;
use Plugin\AceClient\Exception\AceDateTimeCreateFailedException;

/**
 * Class for AceDateTime
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTime  implements AceDateTimeInterface
{

    public const ACE_DATE_FORMAT     = "Ymd";
    public const EC_DATE_FORMAT       = "Y-m-d";

    /**
     * @var Datetime $dateTime
     */
    private Datetime $dateTime;

    /**
     * @var string $format
     */
    private string $format;

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
        $this->dateTime = $this->createNewDateTime($dateTime, $format);
        $this->format = $format;
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
            throw new AceDateTimeCreateFailedException($dateTime, $format);
        }
        return $result;
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
    public function toEccubeDateTime(): string
    {
        return $this->dateTime->format(self::EC_DATE_FORMAT);
    }

    /**
     * {@inheritDoc}
     */
    public function toJapaneseLongDate(): string
    {
        return $this->dateTime->format('Y年m月d日');
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
        return $this->dateTime->format('Y-m-d');
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

}