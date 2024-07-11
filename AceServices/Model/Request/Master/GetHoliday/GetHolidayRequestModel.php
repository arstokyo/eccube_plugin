<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHoliday;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetHolidayRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHolidayRequestModel extends RequestModelAbstract implements GetHolidayRequestModelInterface
{
    const XML_NODE_NAME = 'getHoliday';

    use NoCategory\SyidTrait;

    /** @var ?AceDateTime\AceDateTime $startday 開始日 */
    protected ?AceDateTime\AceDateTime $startday = null;

    /** @var ?AceDateTime\AceDateTime $endday 終了日 */
    protected ?AceDateTime\AceDateTime $endday = null;

    /** @var ?string $skid 倉庫ID */
    protected ?string $skid = null;

    /**
     * {@inheritDoc}
     */
    public function getStartday()
    {
        return $this->startday;
    }

    /**
     * {@inheritDoc}
     */
    public function setStartday($startday)
    {
        $this->startday = AceDateTime\AceDateTimeFactory::makeAceDateTime($startday);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEndday()
    {
        return $this->endday;
    }

    /**
     * {@inheritDoc}
     */
    public function setEndday($endday)
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
    public function setSkid(?string $skid)
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