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
    private array $japaneseStartYear = [
        '明治' => 1867,
        '大正' => 1911,
        '昭和' => 1925,
        '平成' => 1988,
        '令和' => 2018,
    ];

    private array $aceDateTimeFormats = ['!Ymd', 'YmdHis', '!Ym', '!Y'];

    /**
     * @var Datetime $dateTime
     */
    private Datetime $dateTime;

    /**
     * @var string $targetNormalizeFormat
     */
    private string $targetNormalizeFormat;

    private string $defaultTimezone = AceDateTimeFactory::ASIAN_TOKYO_TIMEZONE;

    /**
     * Constructor for AceDateTime
     * 
     * @param Datetime|string $dateTime
     * @param string $targetNormalizeFormat
     * 
     * @throws AceDateTimeCreateFailedException
     */
    public function __construct(Datetime|string $dateTime, $targetNormalizeFormat = AceDateTimeFactory::ACE_DEFAULT_DATE_FORMAT)
    {
        $this->targetNormalizeFormat = $targetNormalizeFormat;
        $this->dateTime = $this->createNewDateTime($dateTime, $targetNormalizeFormat);
    }

    /**
     * Create new DateTime object
     * 
     * @param string|int|Datetime $dateTime
     * @param string $targetNormalizeFormat
     * 
     * @throws AceDateTimeCreateFailedException
     * @return Datetime
     */
    private function createNewDateTime(string|int|Datetime $dateTime, $targetNormalizeFormat): Datetime
    {
        if ($dateTime instanceof Datetime) {
            return $dateTime;
        } 

        $dateTime = $this->convertToWesternFormat($dateTime);
        $result = $this->tryParseToAceFormat($dateTime, $targetNormalizeFormat);
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
        return $this->dateTime->format($this->targetNormalizeFormat);
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
        return clone $this->dateTime;
    }


    /**
     * Convert to Western format
     * 
     * @param string|int $dateTime
     * 
     * @return string
     */
    private function convertToWesternFormat(string|int $dateTime): string
    {
        if (preg_match('/^(明治|大正|昭和|平成|令和)([0-9]+)\/?/', $dateTime, $matches)) {
            $yearAsInt = intval($this->japaneseStartYear[$matches[1]]) + intval($matches[2]);
            return str_replace($matches[1].$matches[2], $yearAsInt, $dateTime);
        }
        return $dateTime;
    }

    /**
     * Try to parse to Ace format
     * 
     * @param string $dateTime
     * @param string $targetNormalizeFormat
     * 
     * @return DateTime|false
     */
    private function tryParseToAceFormat(string $dateTime, $targetNormalizeFormat): DateTime|false
    {
        $prepareFormats = \in_array($targetNormalizeFormat, $this->aceDateTimeFormats) ? $this->aceDateTimeFormats : array_merge($this->aceDateTimeFormats, [$targetNormalizeFormat]);

        foreach ($prepareFormats as $format) {
            $result = DateTime::createFromFormat($format, $dateTime);
            if ($result !== false) {
                return $result;
            }
        }
        return $result;
    }

}