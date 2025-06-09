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
 * @EntityExtension("Eccube\Entity\CustomerAddress")
 */
trait CustomerAddressTrait
{
    /**
     * Aceの顧客住所枝番号
     *
     * @var int|null
     *
     * @ORM\Column(name="ace_eda_no", type="integer", length=6, nullable=true, options={"comment":"Ace住所枝番号"})
     */
    private ?int $ace_eda_no = null;

    /**
     * Aceの顧客住所枝番号を取得する
     *
     * @return int|null
     */
    public function getAceEdaNo(): ?int
    {
        return $this->ace_eda_no;
    }

    /**
     * Aceの顧客住所枝番号を設定する
     *
     * @param int|null $ace_eda_no
     *
     * @return $this
     */
    public function setAceEdaNo(?int $ace_eda_no)
    {
        $this->ace_eda_no = $ace_eda_no;

        return $this;
    }
}
