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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for JyumeiModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Jyumei\JyumeiModelGroup2Interface, Jyumei\JyumeiModelGroup3Interface, Zaiko\HasIgnoreZaikoInterface, Zaiko\HasZaikoInterface
{
    /**
     * サポートIDリストをセットします。
     * カンマ区切りのサポートIDリスト（group_support有効のみ）
     *
     * @param string $supportSpid サポートIDリスト
     */
    public function setSupportSpid(string $supportSpid): void;

    /**
     * サポートIDリストを取得します。
     *
     * @return array サポートIDリスト
     */
    public function getSupportSpid(): array;

    /**
     * サポートのプロバイダをセットします。
     * カンマ区切りの提供商品IDリスト（group_support有効のみ）
     *
     * @param string $supportProvider サポートのプロバイダ
     */
    public function setSupportProvider(string $supportProvider): void;

    /**
     * サポートのプロバイダを取得します。
     *
     * @return array サポートのプロバイダ
     */
    public function getSupportProvider(): array;

    /**
     * 数量付きサポート詳細をセットします。
     * 形式: spid:quantity（group_support有効のみ）
     *
     * @param string $supportSpidQty 数量付きサポート詳細
     */
    public function setSupportSpidQty(string $supportSpidQty): void;

    /**
     * 数量付きサポート詳細を取得します。
     *
     * @return array 数量付きサポート詳細
     */
    public function getSupportSpidQty(): array;

    /**
     * 完全なサポート要約をセットします。
     * 形式: spid:provider1,provider2,provider3:quantity（group_support有効のみ）
     *
     * @param string $supportSummary 完全なサポート要約
     */
    public function setSupportSummary(string $supportSummary): void;

    /**
     * 完全なサポート要約を取得します。
     *
     * @return array 完全なサポート要約
     */
    public function getSupportSummary(): array;

    /**
     * サポートによる商品タイプをセットします。
     * normal: 普通（プロバイダ含み）、product_support: サポートによる商品
     *
     * @param string $itemType 商品タイプ
     */
    public function setItemType(string $itemType): void;

    /**
     * サポートによる商品タイプを取得します。
     *
     * @return string 商品タイプ
     */
    public function getItemType(): string;

    /**
     * プレゼントかどうかを判定します。
     *
     * @return bool プレゼントの場合はtrue
     */
    public function isPresent(): bool;

    /**
     * 商品かどうかを判定します。
     *
     * @return bool 商品の場合はtrue
     */
    public function isProduct(): bool;

    /**
     * 配送料かどうかを判定します。
     *
     * @return bool 配送料の場合はtrue
     */
    public function isDeliveryFee(): bool;

    /**
     * 料金かどうかを判定します。
     *
     * @return bool 料金の場合はtrue
     */
    public function isCharge(): bool;

    /**
     * 割引かどうかを判定します。
     *
     * @return bool 割引の場合はtrue
     */
    public function isDiscount(): bool;
}
