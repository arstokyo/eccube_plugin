<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetDurationOrderTotalRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDurationOrderTotalRequestModel extends RequestModelAbstract implements GetDurationOrderTotalRequestModelInterface
{
    const XML_NODE_NAME = 'getDurationOrderTotal';

    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /** @var ?int $dayfrom 開始日付 */
    protected ?int $dayfrom = null;

    /** @var ?int $dayto 終了日付 */
    protected ?int $dayto = null;

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
    public function getDayfrom(): ?int
    {
        return $this->dayfrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayfrom(?int $dayfrom): static
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
    public function setDayto(?int $dayto): static
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