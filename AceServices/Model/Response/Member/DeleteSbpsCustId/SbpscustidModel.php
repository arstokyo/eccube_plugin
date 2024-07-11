<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Sbpscustid
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class SbpscustidModel implements SbpscustidModelInterface
{
    use Day\DayTrait,
        NoCategory\MbidTrait;

    /** @var ?string $ceda SBPS顧客枝番 */
    protected ?string $ceda = null;

    /** @var ?string $custid SBPS顧客ID */
    protected ?string $custid = null;

    /**
     * {@inheritDoc}
     */
    public function getCeda(): ?string
    {
        return $this->ceda;
    }

    /**
     * {@inheritDoc}
     */
    public function setCeda(?string $ceda)
    {
        $this->ceda = $ceda;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCustid(): ?string
    {
        return $this->custid;
    }

    /**
     * {@inheritDoc}
     */
    public function setCustid(?string $custid)
    {
        $this->custid = $custid;
        return $this;
    }
}