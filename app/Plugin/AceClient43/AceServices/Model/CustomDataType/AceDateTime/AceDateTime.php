<?php

namespace Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

use DateTime;
use DateTimeZone;
use Plugin\AceClient43\Exception\AceDateTimeCreateFailedException;

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
    private array $aceDateTimeFormats = ['!Ymd', 'YmdHis', '!Ym'];

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
    public function __construct($dateTime, $targetNormalizeFormat = AceDateTimeFactory::ACE_DEFAULT_DATE_FORMAT)
    {
        $this->targetNormalizeFormat = $targetNormalizeFormat;
        $this->dateTime = $this->createNewDateTime($dateTime);
    }

    /**
     * Create new DateTime object
     * 
     * @param string|Datetime $dateTime
     * 
     * @throws AceDateTimeCreateFailedException
     * @return Datetime
     */
    private function createNewDateTime($dateTime): Datetime
    {
        if ($dateTime instanceof Datetime) {
            return $dateTime;
        } 

        $dateTime = $this->handleWarekiDateTime($dateTime);
        $result = $this->tryParseToAceFormat($dateTime);
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
     * handle Wareki DateTime
     * 
     * @param string|int $dateTime
     * 
     * @return string
     */
    private function handleWarekiDateTime($dateTime): string
    {
        if (preg_match('/^(明治|大正|昭和|平成|令和)([0-9]+)\/?/', $dateTime, $matches)) {
            $yearAsInt = intval($this->japaneseStartYear[$matches[1]]) + intval($matches[2]);
            return str_replace($matches[1].$matches[2], $yearAsInt, $dateTime);
        }
        
        return $dateTime;
    }

    /**
     * Try parse to Ace format
     * 
     * @param string $dateTime
     * 
     * @return DateTime|false
     */
    private function tryParseToAceFormat(string $dateTime)
    {
        foreach ($this->aceDateTimeFormats as $format) {
            $result = DateTime::createFromFormat($format, $dateTime);
            if ($result !== false) {
                return $result;
            }
        }

        return false;
    }

}