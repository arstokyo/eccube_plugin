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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;

trait BaseItemTrait
{
    /**
     * Ace掛け税率
     *
     * @ORM\Column(name="ace_markup_rate", type="float", precision=10, scale=3, options={"comment":"Ace掛け税率"})
     *
     * @var float
     */
    private float $ace_markup_rate = 0;

    /**
     * 掛け税率を取得
     *
     * @return float
     */
    public function getAceMarkupRate(): float
    {
        return $this->ace_markup_rate;
    }

    /**
     * 掛け税率を設定
     *
     * @param float $ace_markup_rate
     *
     * @return $this
     */
    public function setAceMarkupRate(float $ace_markup_rate)
    {
        $this->ace_markup_rate = $ace_markup_rate;

        return $this;
    }
}
