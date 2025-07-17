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

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    /**
     * @var string|null
     *
     * @SerializedName("return_goodsfree_kubuns")
     */
    private ?string $returnGoodsKubun = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnGoodsKubun(): ?string
    {
        return $this->returnGoodsKubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnGoodsKubun(?array $returnGoodsKubun): self
    {
        if (is_array($returnGoodsKubun)) {
            $this->returnGoodsKubun = implode(',', $returnGoodsKubun);
        } else {
            $this->returnGoodsKubun = '';
        }

        return $this;
    }
}
