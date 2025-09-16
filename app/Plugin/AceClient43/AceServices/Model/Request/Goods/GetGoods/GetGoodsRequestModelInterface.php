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
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetGoodsRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsRequestModelInterface extends RequestModelInterface, Day\HasExecDateFromInterface, Day\HasExecDateToInterface
{
    /**
     * Get IdPrm
     *
     * @return IdPrmModelInterface
     */
    public function getIdPrm(): IdPrmModelInterface;

    /**
     * Set IdPrm
     *
     * @param IdPrmModelInterface $idPrm
     *
     * @return self
     */
    public function setIdPrm(IdPrmModelInterface $idPrm): self;
}
