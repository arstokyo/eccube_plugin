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
use Plugin\AceClient43\Entity\Constants\TransactionType;

trait BaseCartOrderTrait
{
    /**
     * @var int
     *
     * @ORM\Column(name="ace_transaction_type", type="integer", length=1, options={"comment":"ACE取引区分 - Transaction type with customer (one-time/credit)"})
     */
    private int $ace_transaction_type = TransactionType::SINGLE_PAYMENT;

    /**
     * Ace決済ID
     *
     * @ORM\Column(name="ace_payment_id", type="integer", length=4, options={"comment":"ACE決済ID"})
     *
     * @var int
     */
    private int $ace_payment_id;

    /**
     * @var float
     *
     * @ORM\Column(name="ace_delivery_fee", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private float $ace_delivery_fee = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="ace_discount_amount", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private float $ace_discount_amount = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="ace_charge_fee", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private float $ace_charge_fee = 0;

    /**
     * Ace取引区分を設定
     *
     * @param int $ace_transaction_type
     *
     * @return $this
     */
    public function setAceTransactionId(int $ace_transaction_type)
    {
        $this->ace_transaction_type = $ace_transaction_type;

        return $this;
    }

    /**
     * 通販Ace取引区分を取得
     *
     * @return int
     */
    public function getAceTransactionId(): int
    {
        return $this->ace_transaction_type;
    }

    /**
     * Ace決済IDを取得する
     *
     * @return int
     */
    public function getAcePaymentId(): int
    {
        return $this->ace_payment_id;
    }

    /**
     * Ace決済IDを設定する
     *
     * @param int $ace_payment_id
     *
     * @return $this
     */
    public function setAcePaymentId(int $ace_payment_id)
    {
        $this->ace_payment_id = $ace_payment_id;

        return $this;
    }

    /**
     * Ace配送料金を設定する
     *
     * @param float $ace_delivery_fee
     *
     * @return self
     */
    public function setAceDeliveryFee(float $ace_delivery_fee)
    {
        $this->ace_delivery_fee = $ace_delivery_fee;

        return $this;
    }

    /**
     * Ace配送料金を取得する
     *
     * @return float|null
     */
    public function getAceDeliveryFee(): ?float
    {
        return $this->ace_delivery_fee;
    }

    /**
     * Ace割引金額を設定する
     *
     * @param float $ace_discount_amount
     *
     * @return $this
     */
    public function setAceDiscountAmount(float $ace_discount_amount)
    {
        $this->ace_discount_amount = $ace_discount_amount;

        return $this;
    }

    /**
     * Ace割引金額を取得する
     *
     * @return float
     */
    public function getAceDiscountAmount(): float
    {
        return $this->ace_discount_amount;
    }

    /**
     * Ace手数料を設定する
     *
     * @param float $ace_charge_fee
     *
     * @return $this
     */
    public function setAceChargeFee(float $ace_charge_fee)
    {
        $this->ace_charge_fee = $ace_charge_fee;

        return $this;
    }

    /**
     * Ace手数料を取得する
     *
     * @return float
     */
    public function getAceChargeFee(): float
    {
        return $this->ace_charge_fee;
    }
}
