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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetGoodsManyResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsManyResponseModel extends ResponseModelAbtract implements GetGoodsManyResponseModelInterface
{
    /**
     * @var GoodsModelInterface
     */
    protected GoodsModelInterface $Goods;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): GoodsModelInterface
    {
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(GoodsModel $goods): void
    {
        $this->Goods = $goods;
    }
}
