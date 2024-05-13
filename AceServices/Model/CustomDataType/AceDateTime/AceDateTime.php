<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Class for AceDateTime
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTime implements AceDateTimeInterface
{

    public const ACE_DATE_FORMAT     = "Ymd";
    public const EC_DATE_FORMAT       = "Y-m-d";

    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * Constructor
     * 
     * @param \DateTime $dateTime
     */
    public function __construct(int $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * Get the DateTime
     * 
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the DateTime
     * 
     * @param \DateTime $dateTime
     */
    public function setDateTime(\DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * Get the string representation of the object
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Specify data which should be serialized to JSON
     * 
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }
    
}