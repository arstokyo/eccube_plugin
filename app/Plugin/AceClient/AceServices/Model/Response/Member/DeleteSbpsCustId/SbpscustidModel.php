<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Model for Sbpscustid
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class SbpscustidModel implements SbpscustidModelInterface
{
    use Day\DayTrait;

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /** @var ?string $ceda SBPS顧客枝番 */
    protected ?string $ceda = null;

    /** @var ?string $custid SBPS顧客ID */
    protected ?string $custid = null;

    /**
     * {@inheritDoc}
     */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid): static
    {
        $this->mbid = $mbid;
        return $this;
    }

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
    public function setCeda(?string $ceda): static
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
    public function setCustid(?string $custid): static
    {
        $this->custid = $custid;
        return $this;
    }
}