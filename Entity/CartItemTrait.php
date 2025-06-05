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

use Eccube\Annotation\EntityExtension;
use Plugin\AceClient43\Entity\Constants\TaxKubun;

/**
 * @EntityExtension("Eccube\Entity\CartItem")
 */
trait CartItemTrait
{
    use BaseItemTrait;

    /**
     *  Ace税区分
     *
     * @var int
     *
     * @ORM\Column(name="ace_tax_kubun", type="integer", length="1", nullable=false, options={"comment":"Ace税区分"})
     */
    private int $ace_tax_kubun = TaxKubun::ZEINUKI;

    /**
     * Ace税区分を取得
     *
     * @return int
     */
    public function getAceTaxKubun(): int
    {
        return $this->ace_tax_kubun;
    }

    /**
     * Ace税区分を設定
     *
     * @param int $ace_tax_kubun
     *
     * @return self
     */
    public function setAceTaxKubun(int $ace_tax_kubun): self
    {
        $this->ace_tax_kubun = $ace_tax_kubun;

        return $this;
    }
}
