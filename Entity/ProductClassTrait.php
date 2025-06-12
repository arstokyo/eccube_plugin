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
use Plugin\AceClient43\Entity\Constants\AceProductType;

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
     * @ORM\Column(name="ace_product_id", type="string", length=20, options={"comment":"Ace商品ID"}, unique=true)
     */
    private ?string $ace_product_id = null;

    /**
     * Aceの商品種別
     *
     * @var int
     *
     * @ORM\Column(name="ace_product_type", type="integer", options={"default":0, "comment":"Ace商品種別"})
     */
    private int $ace_product_type = AceProductType::PRODUCT;

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

    /**
     * Aceの商品種別を取得する
     *
     * @return int
     */
    public function getAceProductType(): int
    {
        return $this->ace_product_type;
    }

    /**
     * Aceの商品種別を設定する
     *
     * @param int $ace_product_type
     *
     * @return $this
     */
    public function setAceProductType(int $ace_product_type)
    {
        $this->ace_product_type = $ace_product_type;

        return $this;
    }
}
