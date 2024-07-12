<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 3つフリー日付
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFdayTrait
{
    /** @var AceDateTime\AceDateTimeInterface|null $fday1 フリー日付１ */
    protected ?AceDateTime\AceDateTimeInterface $fday1 = null;

    /** @var AceDateTime\AceDateTimeInterface|null $fday2 フリー日付２ */
    protected ?AceDateTime\AceDateTimeInterface $fday2 = null;

    /** @var AceDateTime\AceDateTimeInterface|null $fday3 フリー日付３ */
    protected ?AceDateTime\AceDateTimeInterface $fday3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFday1()
    {
        return $this->fday1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday1($fday1)
    {
        $this->fday1 = AceDateTime\AceDateTimeFactory::makeAceDateTime($fday1);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFday2()
    {
        return $this->fday2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday2($fday2)
    {
        $this->fday2 = AceDateTime\AceDateTimeFactory::makeAceDateTime($fday2);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFday3()
    {
        return $this->fday3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFday3($fday3)
    {
        $this->fday3 = AceDateTime\AceDateTimeFactory::makeAceDateTime($fday3);
        return $this;
    }

}