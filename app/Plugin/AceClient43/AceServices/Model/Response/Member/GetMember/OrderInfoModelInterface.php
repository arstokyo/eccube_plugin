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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Has OrderInfoModel
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
    /** @SerializedName("nomoney_flg") */
    public function getNomoneyFlg(): ?int;

    /**
     * Set 未入金フラグ
     *
     * @param ?int $nomoneyFlg
     */
    /** @SerializedName("nomoney_flg") */
    public function setNomoneyFlg(?int $nomoneyFlg);

    /**
     * Get 購入回数
     *
     * @return ?int
     */
    /** @SerializedName("order_cnt") */
    public function getOrderCnt(): ?int;

    /**
     * Set 購入回数
     *
     * @param ?int $orderCnt
     */
    /** @SerializedName("order_cnt") */
    public function setOrderCnt(?int $orderCnt);

    /**
     * Get 最新購入日
     *
     * @return string|int|null
     */
    /** @SerializedName("order_maxday") */
    public function getOrderMaxday(): ?string;

    /**
     * Set 最新購入日
     *
     * @param string|int|null $orderMaxday
     */
    /** @SerializedName("order_maxday") */
    public function setOrderMaxday(?string $orderMaxday);
}
