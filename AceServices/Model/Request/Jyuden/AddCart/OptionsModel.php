<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

class OptionsModel implements OptionsModelInterface
{
    /**
     * レスポンスグループ化フラグ
     * true/1: レスポンス時に、受注サポートで振られた商品をグループ化
     */
    protected bool $groupSupport = false;

    /**
     * キャンペーンフラグを削除するかどうか（true で削除）
     */
    protected ?bool $removeCampaignFlg = null;

    /**
     * 返却受注伝票フリー区分のリスト（例: "100001,100002"）
     * カンマ区切りの数字リスト
     */
    protected ?string $returnJdKubuns = null;

    /**
     * 返却受注明細フリー区分のリスト（例: "100001,100002"）
     * カンマ区切りの数字リスト
     */
    protected ?string $returnJmKubuns = null;

    /**
     * 特別付与区分の返却指定（例: [2]）
     *
     * @var array<int,int>|null
     */
    protected ?array $returnSpGiveKbns = null;

    /**
     * 受注サポート計算モード。指定可能値: "all"|"point"|"message"
     */
    protected ?string $calcSupportMode = null;

    public function isGroupSupport(): bool
    {
        return $this->groupSupport;
    }

    public function setGroupSupport(bool $groupSupport): self
    {
        $this->groupSupport = $groupSupport;

        return $this;
    }

    public function getReturnJdKubuns(): ?string
    {
        return $this->returnJdKubuns;
    }

    public function setReturnJdKubuns(?array $kubuns): self
    {
        $this->returnJdKubuns = $this->normalizeKubunArray($kubuns);

        return $this;
    }

    public function getReturnJmKubuns(): ?string
    {
        return $this->returnJmKubuns;
    }

    public function setReturnJmKubuns(?array $kubuns): self
    {
        $this->returnJmKubuns = $this->normalizeKubunArray($kubuns);

        return $this;
    }

    public function getReturnSpGiveKbns(): ?array
    {
        return $this->returnSpGiveKbns;
    }

    public function setReturnSpGiveKbns(?array $kbns): self
    {
        $this->returnSpGiveKbns = $kbns;

        return $this;
    }

    public function getCalcSupportMode(): ?string
    {
        return $this->calcSupportMode;
    }

    public function setCalcSupportMode(?string $mode): self
    {
        $this->calcSupportMode = $mode;

        return $this;
    }

    /**
     * remove_campaign_flg の取得
     */
    public function getRemoveCampaignFlg(): ?bool
    {
        return $this->removeCampaignFlg;
    }

    /**
     * remove_campaign_flg の設定（true でキャンペーンフラグを立てない）
     */
    public function setRemoveCampaignFlg(?bool $remove): OptionsModelInterface
    {
        $this->removeCampaignFlg = $remove;

        return $this;
    }

    /**
     * Kubun 配列を数値のみにフィルタし、カンマ区切り文字列に正規化
     *
     * @param array<int,mixed>|null $kubuns
     */
    private function normalizeKubunArray(?array $kubuns): ?string
    {
        if ($kubuns === null) {
            return null;
        }

        $nums = [];
        foreach ($kubuns as $k) {
            // 数値 or 数字文字列のみ許容
            if (is_int($k)) {
                $nums[] = (string) $k;
            } elseif (is_string($k) && ctype_digit($k)) {
                $nums[] = ltrim($k, '0') === '' ? '0' : (string) (int) $k;
            }
        }

        if (empty($nums)) {
            return null;
        }

        return implode(',', $nums);
    }
}
