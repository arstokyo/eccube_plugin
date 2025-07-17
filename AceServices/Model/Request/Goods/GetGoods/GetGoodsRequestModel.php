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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class GetGoodsRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsRequestModel extends RequestModelAbstract implements GetGoodsRequestModelInterface
{
    use Day\ExecDateFromTrait;

    use Day\ExecDateToTrait;
    public const XML_NODE_NAME = 'getGoods';

    /**
     * @var IdPrmModelInterface|null
     *
     * @SerializedName("id")
     */
    private ?IdPrmModelInterface $idPrm = null;

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
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->idPrm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('idPrm'));
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
