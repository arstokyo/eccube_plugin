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
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\ProductClass")
 */
trait ProductClassTrait
{
    /**
     * Aceの商品ID
     *
     * @var string|null
     *
     * @ORM\Column(name="ace_product_id", type="string", length=20, nullable=true, options={"comment":"Ace商品ID"}, unique=true)
     */
    private ?string $ace_product_id = null;

    /**
     * Aceの商品IDを取得する
     *
     * @return string|null
     */
    public function getAceProductId(): ?string
    {
        return $this->ace_product_id;
    }

    /**
     * Aceの商品IDを設定する
     *
     * @param string|null $ace_product_id
     *
     * @return $this
     */
    public function setAceProductId(?string $ace_product_id)
    {
        $this->ace_product_id = $ace_product_id;

        return $this;
    }
}
