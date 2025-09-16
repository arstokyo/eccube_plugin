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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetGoodsBunruiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsBunruiRequestModel extends RequestModelAbstract implements GetGoodsBunruiRequestModelInterface
{
    use NoCategory\IdTrait;
    public const XML_NODE_NAME = 'getGoodsBunrui';

    /** @var ?string 分類区分 */
    protected ?string $kubun = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?string
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?string $kubun)
    {
        $this->kubun = $kubun;

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
        if (!$this->kubun) {
            throw new MissingRequestParameterException($this->compilePropertyName('kubun'));
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
