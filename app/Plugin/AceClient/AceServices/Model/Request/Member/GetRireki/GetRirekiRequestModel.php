<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class GetRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiRequestModel extends RequestModelAbstract implements GetRirekiRequestModelInterface
{
    use NoCategory\IdTrait,NoCategory\McodeTrait;
    const XML_NODE_NAME = 'getRireki';

    /** @var ?int $dispRow 表示行数 */
    protected ?int $dispRow = null;

    /** @var ?int $dispPage 表示ページ */
    protected ?int $dispPage = null;

    /** @var int $sort ソートコード */
    protected int $sort;

    /**
    * {@inheritDoc}
    */
    public function getDispRow(): ?int
    {
        return $this->dispRow;
    }

    /**
    * {@inheritDoc}
    */
    public function setDispRow(?int $dispRow)
    {
        $this->dispRow = $dispRow;
        return $this;
    }

    /**
    * {@inheritDoc}
    */
    public function getDispPage(): ?int
    {
        return $this->dispPage;
    }

    /**
    * {@inheritDoc}
    */
    public function setDispPage(?int $dispPage)
    {
        $this->dispPage = $dispPage;
        return $this;
    }

    /**
    * {@inheritDoc}
    */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
    * {@inheritDoc}
    */
    public function setSort(int $sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mcode) { throw new MissingRequestParameterException($this->compilePropertyName('mcode')); };
        if (!$this->dispRow) { throw new MissingRequestParameterException($this->compilePropertyName('dispRow')); };
        if (!$this->dispPage) { throw new MissingRequestParameterException($this->compilePropertyName('dispPage')); };
        if (!$this->sort) { throw new MissingRequestParameterException($this->compilePropertyName('sort')); };

    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}