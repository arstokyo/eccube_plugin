<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Class GetHolidayRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHolidayRequestModel extends RequestModelAbstract implements GetHolidayRequestModelInterface
{
    const XML_NODE_NAME = 'getHoliday';

    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /** @var ?AceDateTime\AceDateTime $startday 開始日 */
    protected ?AceDateTime\AceDateTime $startday = null;

    /** @var ?AceDateTime\AceDateTime $endday 終了日 */
    protected ?AceDateTime\AceDateTime $endday = null;

    /**
     * {@inheritDoc}
     */
    public function getSyid(): ?int
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(?int $syid): static
    {
        $this->syid = $syid;
        return $this;
    }

    /** @var ?string $skid 倉庫ID */
    protected ?string $skid = null;

    /**
     * {@inheritDoc}
     */
    public function getStartday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->startday;
    }

    /**
     * {@inheritDoc}
     */
    public function setStartday(\DateTime|string|null $startday): static
    {
        $this->startday = AceDateTime\AceDateTimeFactory::makeAceDateTime($startday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEndday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->endday;
    }

    /**
     * {@inheritDoc}
     */
    public function setEndday(\DateTime|string|null $endday): static
    {
        $this->endday = AceDateTime\AceDateTimeFactory::makeAceDateTime($endday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSkid(): ?string
    {
        return $this->skid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSkid(?string $skid): static
    {
        $this->skid = $skid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->startday) { throw new MissingRequestParameterException($this->compilePropertyName('startday')); };
        if (!$this->endday) { throw new MissingRequestParameterException($this->compilePropertyName('endday')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}