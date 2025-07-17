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

interface OptionsModelInterface
{
    /**
     * Get ReturnGoodsKubun
     *
     * @return string
     */
    public function getReturnGoodsKubun(): ?string;

    /**
     * Set ReturnGoodsKubun
     *
     * @param array $returnGoodsKubun
     *
     * @return self
     */
    public function setReturnGoodsKubun(?array $returnGoodsKubun): self;
}
