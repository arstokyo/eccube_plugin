<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Entity\Config;

interface AddCartRequestConverterInterface
{
    /**
     * フローを設定
     *
     * @param AddCartFlow $flow
     * @return self
     */
    public function setFlow(AddCartFlow $flow): self;

    /**
     * 現在のフローを取得
     *
     * @return AddCartFlow|null
     */
    public function getFlow(): ?AddCartFlow;

    /**
     * 顧客と配送先から MemberOrderModel を構築
     *
     * @param Customer $customer
     * @param CustomerAddress|null $customerAddress
     * @param array $options
     * @return RequestAddCart\MemberOrderModelInterface
     */
    public function buildMemberOrderModel(
        Customer $customer,
        ?CustomerAddress $customerAddress,
        array $options = [],
    ): RequestAddCart\MemberOrderModelInterface;

    /**
     * 共通フィールドで JyudenModel を構築
     * Bridge固有のフィールド（weborderno, notesなど）は呼び出し元で設定すること
     *
     * @param string $transactionId
     * @param string $paymentId
     * @param bool $isOrderSupportEnabled
     * @param Config $config
     * @param array $options
     * @return RequestAddCart\JyudenModelInterface
     */
    public function buildJyudenModel(
        string $transactionId,
        string $paymentId,
        bool $isOrderSupportEnabled,
        Config $config,
        array $options = [],
    ): RequestAddCart\JyudenModelInterface;

    /**
     * 共通設定で OptionsModel を構築
     *
     * @param array $options
     * @return RequestAddCart\OptionsModelInterface
     */
    public function buildOptionsModel(
        array $options = [],
    ): RequestAddCart\OptionsModelInterface;

    /**
     * 共通の注文合計（手数料、値引、送料）を JyudenModel に適用
     *
     * @param RequestAddCart\JyudenModelInterface $jyuden
     * @param float $charge
     * @param float $discount
     * @param float $deliveryFee
     * @param Config $config
     * @param array $options
     * @return void
     */
    public function applyOrderTotals(
        RequestAddCart\JyudenModelInterface $jyuden,
        float $charge,
        float $discount,
        float $deliveryFee,
        Config $config,
        array $options = [],
    ): void;

    /**
     * 配列から JyudenFree モデル群を構築
     *
     * @param array $freeMap
     * @return array
     */
    public function buildJyudenFreeModels(array $freeMap): array;
}
