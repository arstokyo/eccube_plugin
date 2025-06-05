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
     * @ORM\Column(name="ace_gdid", type="string", length=20, nullable=true, options={"comment":"Ace商品ID"}, unique=true)
     */
    private ?string $ace_gdid = null;

    /**
     * Aceの商品IDを取得する
     *
     * @return string|null
     */
    public function getAceGdid(): ?string
    {
        return $this->ace_gdid;
    }

    /**
     * Aceの商品IDを設定する
     *
     * @param string|null $ace_gdid
     *
     * @return self
     */
    public function setAceGdid(?string $ace_gdid): self
    {
        $this->ace_gdid = $ace_gdid;

        return $this;
    }
}
