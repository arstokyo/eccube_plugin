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
use Plugin\AceClient43\Entity\Constants\AceTaxType;

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
     * @ORM\Column(name="ace_tax_type", type="integer", length="1", nullable=false, options={"comment":"Ace税区分"})
     */
    private int $ace_tax_type = AceTaxType::TAX_EXCLUDED;

    /**
     * Ace税区分を取得
     *
     * @return int
     */
    public function getAceTaxType(): int
    {
        return $this->ace_tax_type;
    }

    /**
     * Ace税区分を設定
     *
     * @param int $ace_tax_type
     *
     * @return $this
     */
    public function setAceTaxType(int $ace_tax_type)
    {
        $this->ace_tax_type = $ace_tax_type;

        return $this;
    }
}
