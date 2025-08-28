<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Symfony\Component\Serializer\Annotation\SerializedName;

interface OptionsModelInterface
{
    public const CALC_SUPPORT_MODE_ALL = 'all';
    public const CALC_SUPPORT_MODE_POINT = 'point';
    public const CALC_SUPPORT_MODE_MESSAGE = 'message';

    /**
     * レスポンスグループ化
     * 型: Boolean
     * true または 1 を指定すると、レスポンス時に受注サポートで振られた商品をグループ化します。
     *
     * @SerializedName("group_support")
     */
    public function isGroupSupport(): ?bool;

    /**
     * レスポンスグループ化を設定
     *
     * @param bool $groupSupport true/1 でグループ化有効
     */
    public function setGroupSupport(?bool $groupSupport): self;

    /**
     * 返却受注伝票フリー区分のリスト
     * 型: String
     * 最大長: 2000
     * カンマ区切りの数字リストを返します（例: "100001,100002"）。
     * セッターには配列（mixed可）を渡すと、数値要素のみ抽出してカンマ区切り文字列に正規化します。
     *
     * @SerializedName("return_jdkubuns")
     */
    public function getReturnJdKubuns(): ?string;

    /**
     * 返却受注伝票フリー区分のリストを設定
     *
     * @param array<int,mixed>|null $kubuns 数値のみ有効（非数値は除外）。例: [100001, "100002", "abc" => 除外]
     */
    public function setReturnJdKubuns(?array $kubuns): self;

    /**
     * 返却受注明細フリー区分のリスト
     * 型: String
     * 最大長: 2000
     * カンマ区切りの数字リストを返します（例: "100001,100002"）。
     * セッターには配列（mixed可）を渡すと、数値要素のみ抽出してカンマ区切り文字列に正規化します。
     *
     * @SerializedName("return_jmkubuns")
     */
    public function getReturnJmKubuns(): ?string;

    /**
     * 返却受注明細フリー区分のリストを設定
     *
     * @param array<int,mixed>|null $kubuns 数値のみ有効（非数値は除外）。例: [100001, "100002"]
     */
    public function setReturnJmKubuns(?array $kubuns): self;

    /**
     * 特別付与区分の返却指定
     *
     * @return array<int,int>|null
     *
     * @SerializedName("return_sp_givekbns")
     */
    public function getReturnSpGiveKbns(): ?array;

    /**
     * 特別付与区分の返却指定を設定
     *
     * @param array<int,int>|null $kbns 例: [2]
     */
    public function setReturnSpGiveKbns(?array $kbns): self;

    /**
     * 受注サポート計算モード
     * 指定可能値: "all"|"point"|"message"
     *
     * @SerializedName("calc_support_mode")
     */
    public function getCalcSupportMode(): ?string;

    /**
     * 受注サポート計算モードを設定
     *
     * @param string|null $mode self::CALC_SUPPORT_MODE_* 定数を指定
     */
    public function setCalcSupportMode(?string $mode): self;

    /**
     * 返却受注予定出荷日を返却するかどうか
     * 型: Boolean
     * true の場合、返却受注伝票の出荷日を返却受注予定出荷日に設定します。
     *
     * @SerializedName("return_calc_hday")
     */
    public function getReturnPlannedShippingDay(): ?bool;

    /**
     * 返却受注予定出荷日を返却するかどうかを設定
     *
     * @param bool|null $return true で返却受注予定出荷日を返却
     */
    public function setReturnPlannedShippingDay(?bool $return): self;

    /**
     * キャンペーンフラグを削除するかどうか
     * 型: Boolean
     * true の場合、受注サポート計算後にキャンペーンフラグを立てない（既存レコードの再記録抑止等の用途）。
     *
     * @SerializedName("remove_campaign_flg")
     */
    public function getRemoveCampaignFlg(): ?bool;

    /**
     * キャンペーンフラグの削除設定
     *
     * @param bool|null $remove true でキャンペーンフラグを立てない
     */
    public function setRemoveCampaignFlg(?bool $remove): self;
}
