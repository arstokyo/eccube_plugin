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
 * @EntityExtension("Eccube\Entity\OrderItem")
 */
trait OrderItemTrait
{
    use BaseItemTrait;

    /**
     * 通販Aceの在庫を無視するフラグ
     *
     * @ORM\Column(name="ace_tax_kubun", type="integer", length="1", nullable=false, options={"comment":"通販Aceの在庫を無視するフラグ"})
     *
     * @var bool
     */
    private bool $ace_ignore_stock = true;

    /**
     * 通販Aceの在庫を無視するフラグを取得
     *
     * @return bool
     */
    public function isAceIgnoreStock(): bool
    {
        return $this->ace_ignore_stock;
    }

    /**
     * 通販Aceの在庫を無視するフラグを設定
     *
     * @param bool $ace_ignore_stock
     *
     * @return self
     */
    public function setAceIgnoreStock(bool $ace_ignore_stock): self
    {
        $this->ace_ignore_stock = $ace_ignore_stock;

        return $this;
    }
}
