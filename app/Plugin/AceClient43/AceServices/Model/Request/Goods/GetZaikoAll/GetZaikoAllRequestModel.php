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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaikoAll;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetZaikoAllRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoAllRequestModel extends RequestModelAbstract implements GetZaikoAllRequestModelInterface
{
    use NoCategory\IdTrait;

    use Souko\SoukoTrait;
    public const XML_NODE_NAME = 'getZaikoAll';

    /** @var ?int 開始行番号 */
    protected ?int $rangefrom = null;
    /** @var ?int 終了行番号 */
    protected ?int $rangeto = null;

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
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
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
