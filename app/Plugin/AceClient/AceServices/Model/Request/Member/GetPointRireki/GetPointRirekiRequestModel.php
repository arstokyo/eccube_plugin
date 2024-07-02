<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetPointRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPointRirekiRequestModel extends RequestModelAbstract implements GetPointRirekiRequestModelInterface
{
    const XML_NODE_NAME = 'getPointRireki';


    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /** @var ?string $jmemid 受注顧客ID */
    protected ?string $jmemid = null;

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
    public function getJmemid(): ?string
    {
        return $this->jmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmemid(?string $jmemid): static
    {
        $this->jmemid = $jmemid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->jmemid) { throw new MissingRequestParameterException($this->compilePropertyName('jmemid')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}