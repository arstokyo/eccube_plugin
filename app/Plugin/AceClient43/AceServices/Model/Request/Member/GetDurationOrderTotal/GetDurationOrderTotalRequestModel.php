<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetDurationOrderTotalRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDurationOrderTotalRequestModel extends RequestModelAbstract implements GetDurationOrderTotalRequestModelInterface
{
    const XML_NODE_NAME = 'getDurationOrderTotal';

    use NoCategory\SyidTrait,
        NoCategory\MbidTrait;

    /** @var ?int $dayfrom 開始日付 */
    protected ?int $dayfrom = null;

    /** @var ?int $dayto 終了日付 */
    protected ?int $dayto = null;

    /**
     * {@inheritDoc}
     */
    public function getDayfrom(): ?int
    {
        return $this->dayfrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayfrom(?int $dayfrom)
    {
        $this->dayfrom = $dayfrom;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDayto(): ?int
    {
        return $this->dayto;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayto(?int $dayto)
    {
        $this->dayto = $dayto;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}