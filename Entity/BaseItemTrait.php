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
     * 掛け税率
     *
     * @ORM\Column(name="ace_ritu", type="float", precision=10, scale=3, nullable=false, options={"comment":"Ace掛け税率"})
     *
     * @var float
     */
    private float $ace_kake_ritu = 0;

    /**
     * 掛け税率を取得
     *
     * @return float
     */
    public function getAceKakeRitu(): float
    {
        return $this->ace_kake_ritu;
    }

    /**
     * 掛け税率を設定
     *
     * @param float $ace_kake_ritu
     *
     * @return self
     */
    public function setAceKakeRitu(float $ace_kake_ritu): self
    {
        $this->ace_kake_ritu = $ace_kake_ritu;

        return $this;
    }
}
