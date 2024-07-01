<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for OrderInfoModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface OrderInfoModelInterface
{
    /**
     * Get 未入金フラグ
     *
     * @return ?int
     */
    /** @SerializedName("NOMONEY_FLG") */
    public function getNomoneyFlg(): ?int;

    /**
     * Set 未入金フラグ
     *
     * @param ?int $nomoneyFlg
     */
    /** @SerializedName("NOMONEY_FLG") */
    public function setNomoneyFlg(?int $nomoneyFlg);
    /**
     * Get 購入回数
     *
     * @return ?int
     */
    /** @SerializedName("ORDER_CNT") */
    public function getOrderCnt(): ?int;

    /**
     * Set 購入回数
     *
     * @param ?int $orderCnt
     */
    /** @SerializedName("ORDER_CNT") */
    public function setOrderCnt(?int $orderCnt);
    /**
     * Get 最新購入日
     *
     * @return string|int|null
     */
    /** @SerializedName("ORDER_MAXDAY") */
    public function getOrderMaxday(): ?string;

    /**
     * Set 最新購入日
     *
     * @param string|int|null $orderMaxday
     */
    /** @SerializedName("ORDER_MAXDAY") */
    public function setOrderMaxday(?string $orderMaxday);
}