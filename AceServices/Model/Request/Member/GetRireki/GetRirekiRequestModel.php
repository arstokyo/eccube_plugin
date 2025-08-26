<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class GetRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiRequestModel extends RequestModelAbstract implements GetRirekiRequestModelInterface
{
    use NoCategory\McodeTrait;

    /**
     * @var IdPrmModelInterface
     *
     * @SerializedName("id")
     */
    protected IdPrmModelInterface $idPrm;

    public const XML_NODE_NAME = 'getRireki';

    /** @var ?int 表示行数 */
    protected ?int $dispRow = null;

    /** @var ?int 表示ページ */
    protected ?int $dispPage = null;

    /** @var int ソートコード */
    protected int $sort;

    /**
     * {@inheritDoc}
     */
    public function getIdPrm(): IdPrmModelInterface
    {
        return $this->idPrm;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPrm(IdPrmModelInterface $idPrm): self
    {
        $this->idPrm = $idPrm;

        return $this;
    }

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
        if (empty($this->idPrm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('idPrm'));
        }

        if (!$this->mcode) {
            throw new MissingRequestParameterException($this->compilePropertyName('mcode'));
        }
        if (!$this->dispRow) {
            throw new MissingRequestParameterException($this->compilePropertyName('dispRow'));
        }
        if (!$this->dispPage) {
            throw new MissingRequestParameterException($this->compilePropertyName('dispPage'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
