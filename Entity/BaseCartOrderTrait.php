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
use Plugin\AceClient43\Util\Converter\NumberConverter;

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
     * @var string Ace配送料金（DB decimal を文字列で保持）
     *
     * @ORM\Column(name="ace_delivery_fee", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private string $ace_delivery_fee = '0.00';

    /**
     * @var string Ace割引金額（DB decimal を文字列で保持）
     *
     * @ORM\Column(name="ace_discount_amount", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private string $ace_discount_amount = '0.00';

    /**
     * @var string Ace手数料（DB decimal を文字列で保持）
     *
     * @ORM\Column(name="ace_charge_fee", type="decimal", precision=12, scale=2, options={"default":0})
     */
    private string $ace_charge_fee = '0.00';

    /**
     * ACEから返却された付与予定ポイント（自動加算用）
     *
     * @var string DB decimal を文字列で保持
     *
     * @ORM\Column(name="ace_earnable_point", type="decimal", precision=12, scale=2, options={"default":0, "comment":"ACEから返却された付与予定ポイント"})
     */
    private string $ace_earnable_point = '0.00';

    /**
     * Ace取引区分を設定
     *
     * @param int $ace_transaction_type
     *
     * @return $this
     */
    public function setAceTransactionId(int $ace_transaction_type): static
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
    public function setAcePaymentId(int $ace_payment_id): static
    {
        $this->ace_payment_id = $ace_payment_id;

        return $this;
    }

    /**
     * Ace配送料金を設定する
     *
     * - decimal(scale=2) に合わせて小数点以下 2 桁へ正規化して保存します。
     * - 0 未満は 0 として扱います。
     * - 同一値の場合は変更しません。
     *
     * @param float $ace_delivery_fee
     *
     * @return self
     */
    public function setAceDeliveryFee(float $ace_delivery_fee): static
    {
        $normalized = NumberConverter::normalizeFloatToString(max(0, $ace_delivery_fee));
        if ($this->ace_delivery_fee === $normalized) {
            return $this;
        }
        $this->ace_delivery_fee = $normalized;

        return $this;
    }

    /**
     * Ace配送料金を取得する
     *
     * @return float|null
     */
    public function getAceDeliveryFee(): ?float
    {
        return (float) $this->ace_delivery_fee;
    }

    /**
     * Ace割引金額を設定する
     *
     * - decimal(scale=2) に合わせて小数点以下 2 桁へ正規化して保存します。
     * - 同一値の場合は変更しません。
     *
     * @param float $ace_discount_amount
     *
     * @return $this
     */
    public function setAceDiscountAmount(float $ace_discount_amount): static
    {
        $normalized = NumberConverter::normalizeFloatToString($ace_discount_amount);
        if ($this->ace_discount_amount === $normalized) {
            return $this;
        }
        $this->ace_discount_amount = $normalized;

        return $this;
    }

    /**
     * Ace割引金額を取得する
     *
     * @return float
     */
    public function getAceDiscountAmount(): float
    {
        return (float) $this->ace_discount_amount;
    }

    /**
     * Ace手数料を設定する
     *
     * - decimal(scale=2) に合わせて正規化します。
     * - 0 未満は 0 として扱います。
     * - 同一値の場合は変更しません。
     *
     * @param float $ace_charge_fee
     *
     * @return $this
     */
    public function setAceChargeFee(float $ace_charge_fee): static
    {
        $normalized = NumberConverter::normalizeFloatToString(max(0, $ace_charge_fee));
        if ($this->ace_charge_fee === $normalized) {
            return $this;
        }
        $this->ace_charge_fee = $normalized;

        return $this;
    }

    /**
     * Ace手数料を取得する
     *
     * @return float
     */
    public function getAceChargeFee(): float
    {
        return (float) $this->ace_charge_fee;
    }

    /**
     * ACEから返却された付与予定ポイントを設定
     *
     * - decimal(scale=2) に合わせて正規化します。
     * - 0 未満は 0 として扱います。
     * - 同一値の場合は変更しません。
     *
     * @param float $point
     *
     * @return $this
     */
    public function setAceEarnablePoint(float $point): static
    {
        $normalized = NumberConverter::normalizeFloatToString(max(0, $point));
        if ($this->ace_earnable_point === $normalized) {
            return $this;
        }
        $this->ace_earnable_point = $normalized;

        return $this;
    }

    /**
     * ACEから返却された付与予定ポイントを取得
     *
     * @return float
     */
    public function getAceEarnablePoint(): float
    {
        return (float) $this->ace_earnable_point;
    }

    /**
     * Normalize number-like inputs to decimal string with given scale.
     *
     * @param mixed $value string|int|float|null
     * @param int $scale
     *
     * @return string
     */
    protected function normalizeNumberToDecimalString($value, int $scale = 2): string
    {
        return NumberConverter::convertNumberToDecimalString($value, $scale);
    }
}
