<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetZaikoAll;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class GetZaikoAllRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoAllRequestModel extends RequestModelAbstract implements GetZaikoAllRequestModelInterface
{
    const XML_NODE_NAME = 'getZaikoAll';

    /** @var ?int $rangefrom 開始行番号 */
    protected ?int $rangefrom = null;
    /** @var ?int $rangeto 終了行番号 */
    protected ?int $rangeto = null;

    use NoCategory\IdTrait,
        Souko\SoukoTrait;

    /**
     * {@inheritDoc}
     */
    public function getRangefrom(): ?int
    {
        return $this->rangefrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setRangefrom(?int $rangefrom)
    {
        $this->rangefrom = $rangefrom;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRangeto(): ?int
    {
        return $this->rangeto;
    }

    /**
     * {@inheritDoc}
     */
    public function setRangeto(?int $rangeto)
    {
        $this->rangeto = $rangeto;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}