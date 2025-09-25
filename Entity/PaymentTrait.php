<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 */

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\Payment")
 */
trait PaymentTrait
{
    /**
     * ACE決済ID
     *
     * ACE側の支払種別（Pcode）と対応付けるためのIDを保持します。
     *
     * 例:
     *  - 2: カード(ベリトランス)
     *  - 4: 銀行振込
     *  - 5: その他(0円用)
     *
     * @var int|null
     *
     * @ORM\Column(name="ace_payment_id", type="integer", nullable=true, options={"unsigned":true})
     */
    private $ace_payment_id;

    /**
     * ACE決済IDを取得
     */
    public function getAcePaymentId(): ?int
    {
        return $this->ace_payment_id;
    }

    /**
     * ACE決済IDを設定
     */
    public function setAcePaymentId(?int $acePaymentId): self
    {
        $this->ace_payment_id = $acePaymentId;

        return $this;
    }
}
