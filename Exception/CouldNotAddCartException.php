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

namespace Plugin\AceClient43\Exception;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

class CouldNotAddCartException extends AceApiMessageException
{
    /**
     * CouldNotAddCartException constructor.
     *
     * @param HasMessageModelInterface|HasMessageModelExtend1Interface|null $messageModel APIレスポンスのメッセージモデル
     * @param \Throwable|null $previous 前の例外
     * @param string $defaultMessage 既定メッセージ（派生クラスで上書き用）
     */
    public function __construct(
        $messageModel = null,
        ?\Throwable $previous = null,
        string $defaultMessage = '通販Aceにカートを追加できませんでした',
    ) {
        parent::__construct(
            $defaultMessage,
            $messageModel,
            $previous
        );
    }

    /**
     * エラーメッセージの先頭プレフィックスを返す（なければ空文字）
     */
    private function getMessagePrefix(): string
    {
        $m1 = (string) ($this->getMessage1() ?? '');
        if ($m1 === '') {
            return '';
        }
        // 先頭の [XXXX] を抽出
        if (preg_match('/^\s*\[([A-Z_]+)\]/', $m1, $m)) {
            return strtoupper($m[1]);
        }

        return '';
    }

    /**
     * AddCartエラーかどうか
     */
    public function isAddCartError(): bool
    {
        return $this->getMessagePrefix() === 'ADDCART_ERROR';
    }

    /**
     * DecisionCartエラーかどうか
     */
    public function isDecisionCartError(): bool
    {
        return $this->getMessagePrefix() === 'DECISIONCART_ERROR';
    }

    /**
     * CreateOrder全体のエラーかどうか
     */
    public function isCreateOrderError(): bool
    {
        return $this->getMessagePrefix() === 'CREATEORDER_ERROR';
    }

    /**
     * メッセージ1に指定のテキストを含むかどうか
     */
    public function containsErrorText(string $needle): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== '' && mb_strpos($m1, $needle) !== false;
    }

    /**
     * 使用ポイント超過の確認メッセージかどうか
     * 例: 「使用ポイントが累計ポイントを超えています。続行しますか？」
     */
    public function isPointExceededError(): bool
    {
        return $this->containsErrorText('使用ポイントが累計ポイントを超えています');
    }

    /**
     * 配送不能地域エラーかどうか
     * 例: 「お届先の住所は配送不能地域です。」
     */
    public function isUndeliverableAreaError(): bool
    {
        return $this->containsErrorText('配送不能地域');
    }

    /**
     * 配達指定日に間に合わないエラーかどうか
     * 例: 「配達指定日に間に合いません。」
     */
    public function isCannotMeetDeliveryDateError(): bool
    {
        return $this->containsErrorText('配達指定日に間に合いません');
    }

    /**
     * 時間指定が不可能な配送先エラーかどうか
     * 例: 「この配送先には時間指定できません。」
     */
    public function isCarrierTimeNotAllowedError(): bool
    {
        return $this->containsErrorText('時間指定できません');
    }

    /**
     * 温度帯違反エラーかどうか
     * 例: 「温度設定が常温です。違反しています。」
     */
    public function isTemperatureBandViolationError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return ($m1 !== '')
            && (mb_strpos($m1, '温度設定が') !== false)
            && (mb_strpos($m1, '違反しています') !== false);
    }

    /**
     * 代引き関連の決済と配送伝票の不一致エラーかどうか
     */
    public function isPaymentCarrierMismatchError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return mb_strpos($m1, '決済種別が代引きなのに配送伝票が代引きではありません') !== false
            || mb_strpos($m1, '配送伝票が代引きなのに決済種別が代引きではありません') !== false;
    }

    /**
     * 与信限度額超過エラーかどうか
     * 例: 「与信限度額 ... オーバーしています。」
     */
    public function isCreditLimitOverError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, '与信限度額') !== false
            && mb_strpos($m1, 'オーバーしています') !== false;
    }

    /**
     * 顧客が悪質登録（ブラックリスト）相当のメッセージかどうか
     * 例: 「悪質登録が見つかりました。」
     */
    public function isBlacklistedCustomerError(): bool
    {
        return $this->containsErrorText('悪質登録が見つかりました');
    }

    /**
     * 掛売取引で使用できない決済種別エラーかどうか
     * 例: 「この決済種別は掛売取引では使用できません。」
     */
    public function isKakeUriNotAllowedError(): bool
    {
        return $this->containsErrorText('掛売取引では使用できません');
    }

    /**
     * 出荷バッチ回数に関するエラーかどうか
     * 例: 「出荷ﾊﾞｯﾁ回数が…」
     */
    public function isBatchCountError(): bool
    {
        return $this->containsErrorText('出荷ﾊﾞｯﾁ回数');
    }

    /**
     * お届先住所に関する不足/不正エラーかどうか
     */
    public function isAddressMissingError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (mb_strpos($m1, 'お届先の住所が未指定です') !== false
                || mb_strpos($m1, 'お届先の住所は配送不能地域です') !== false);
    }

    /**
     * 商品温度帯がすべて不一致（混載不可）エラーかどうか
     * 例: 「商品温度帯すべて不可能です。」
     */
    public function isAllTemperatureIncompatibleError(): bool
    {
        return $this->containsErrorText('温度帯すべて不可能')
            || $this->containsErrorText('商品温度帯すべて不可能');
    }

    /**
     * 時間指定の未指定/不正エラーかどうか
     */
    public function isInvalidOrMissingTimeSlotError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (mb_strpos($m1, '時間指定が未指定です') !== false
                || mb_strpos($m1, '時間指定が不正です') !== false);
    }

    /**
     * 倉庫の未指定/未登録エラーかどうか
     */
    public function isInvalidOrMissingWarehouseError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (mb_strpos($m1, '倉庫が未指定です') !== false
                || (mb_strpos($m1, '倉庫ID') !== false && mb_strpos($m1, '未登録です') !== false));
    }

    /**
     * 決済種別の未指定/不正エラーかどうか
     */
    public function isInvalidOrMissingPaymentError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (mb_strpos($m1, '決済種別が未指定') !== false
                || mb_strpos($m1, '決済種別が不正') !== false);
    }

    /**
     * 配送伝票の未指定/不正/不整合エラーかどうか
     */
    public function isInvalidOrMissingDeliverySlipError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (
                mb_strpos($m1, '配送伝票が未指定') !== false
                || mb_strpos($m1, '配送伝票の設定が不正') !== false
                || mb_strpos($m1, '配送伝票の配送会社が合いません') !== false
                || mb_strpos($m1, '部門・倉庫の紐づきのない配送伝票') !== false
            );
    }

    /**
     * 配送会社不一致（配送会社が合いません）エラーかどうか
     */
    public function isCarrierCompanyMismatchError(): bool
    {
        return $this->containsErrorText('配送伝票の配送会社が合いません');
    }

    /**
     * 出荷予定日が受付日より前日のエラーかどうか
     */
    public function isYdayBeforeJdayError(): bool
    {
        return $this->containsErrorText('出荷予定日が受付日より前日です');
    }

    /**
     * 「伝票区分が保留」なのに日付が入力されている矛盾エラーかどうか
     */
    public function isHoldButDatesSpecifiedError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, '伝票区分が保留です。') !== false
            && (
                mb_strpos($m1, '出荷日が指定されています') !== false
                || mb_strpos($m1, '売上日が指定されています') !== false
            );
    }

    /**
     * 荷物預かり日数超過エラーかどうか
     */
    public function isAzukariDaysExceededError(): bool
    {
        return $this->containsErrorText('荷物預かり日数');
    }

    /**
     * 注文金額が決済種別の下限未満エラーかどうか
     * 例: 「この決済種別では、XXX円以上の購入しかできません。」
     */
    public function isOrderAmountBelowPaymentMinimumError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, 'この決済種別では') !== false
            && (mb_strpos($m1, '円以上の購入しかできません') !== false);
    }

    /**
     * 注文金額が決済種別の上限超過エラーかどうか
     * 例: 「この決済種別では、XXX円までの購入しかできません。」
     */
    public function isOrderAmountAbovePaymentMaximumError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, 'この決済種別では') !== false
            && (mb_strpos($m1, '円までの購入しかできません') !== false);
    }

    /**
     * 商品が終了（販売中止）エラーかどうか
     * 例: 「終了商品です。」
     */
    public function isDiscontinuedGoodsError(): bool
    {
        return $this->containsErrorText('終了商品です');
    }

    /**
     * 直送可否や直送のみ等の制約に違反しているかどうか
     */
    public function isDirectShipConstraintError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, '直送') !== false
            && (mb_strpos($m1, '不可能') !== false || mb_strpos($m1, 'のみ') !== false);
    }

    /**
     * 個人販売数の上限超過エラーかどうか
     */
    public function isPerCustomerSalesLimitExceededError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, '個人販売数') !== false
            && mb_strpos($m1, '超えています') !== false;
    }

    /**
     * 全体販売数の上限超過エラーかどうか
     */
    public function isGlobalSalesLimitExceededError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && mb_strpos($m1, '全体販売数') !== false
            && mb_strpos($m1, '超えています') !== false;
    }

    /**
     * 新規購入の顧客が利用できない決済/条件に該当するかどうか
     */
    public function isNewCustomerNotAllowedError(): bool
    {
        return $this->containsErrorText('新規購入のお客様から購入はできません');
    }

    /**
     * 未入金額がある顧客は購入できない条件に該当するかどうか
     */
    public function isUnpaidBalanceNotAllowedError(): bool
    {
        return $this->containsErrorText('未入金額のあるお客様からの購入はできません');
    }

    /**
     * 滞納者は購入できない条件に該当するかどうか
     */
    public function isDelinquentCustomerNotAllowedError(): bool
    {
        return $this->containsErrorText('「滞納者」のお客様からの購入はできません');
    }

    /**
     * マスタ未登録系のエラーかどうか
     * 例: 「この〇〇ID(XX)では未登録です。」
     */
    public function isMasterNotRegisteredError(): bool
    {
        return $this->containsErrorText('未登録です');
    }

    /**
     * 納品先枝番/受注枝番の未指定エラーかどうか
     */
    public function isMissingNounoOrEdanoError(): bool
    {
        $m1 = (string) ($this->getMessage1() ?? '');

        return $m1 !== ''
            && (
                mb_strpos($m1, '納品先枝番が未指定です') !== false
                || mb_strpos($m1, '受注枝番が未指定です') !== false
            );
    }

    /**
     * ユーザー向けの表示メッセージを取得（フレンドリー文言に変換）
     *
     * - 個人/全体販売数の上限超過エラー時は、翻訳キーへGDIDと上限数量を埋め込んだ文言を返す。
     *   - 個人販売数: ace_client.add_cart.error.perCustomerSale
     *   - 全体販売数: ace_client.add_cart.error.globalSale
     * - 上記以外は message1（なければ例外のメッセージ）を返す。
     *
     * @return string
     */
    public function getUserMessage(): string
    {
        $info = $this->getExceededLimitInfo();

        if ($this->isPerCustomerSalesLimitExceededError() && is_array($info)) {
            return trans('ace_client.add_cart.error.perCustomerSale', [
                '%gdid%' => (string) $info['gdid'],
                '%gdname%' => (string) ($info['gdname'] ?? ''),
                '%quantityTotal%' => (int) ($info['quantityTotal'] ?? 0),
                '%limit%' => (int) ($info['limit'] ?? 0),
            ]);
        }

        if ($this->isGlobalSalesLimitExceededError() && is_array($info)) {
            return trans('ace_client.add_cart.error.globalSale', [
                '%gdid%' => (string) $info['gdid'],
                '%gdname%' => (string) ($info['gdname'] ?? ''),
                '%quantityTotal%' => (int) ($info['quantityTotal'] ?? 0),
                '%limit%' => (int) ($info['limit'] ?? 0),
            ]);
        }

        // fallback: 元のメッセージを返す
        return $this->getOriginalMessage();
    }

    /**
     * オリジナルメッセージを取得する
     */
    public function getOriginalMessage(): string
    {
        return $this->message1 ?: $this->getMessage();
    }

    /**
     * 購入上限超過（個人/全体）エラーのメッセージから、対象商品GDIDと上限数量を抽出する。
     *
     * 想定メッセージ形式:
     *  - 「この商品 (GDID) GNAME は合計($quantityTotal)です。全体販売数($limit)を超えています。」
     *  - 「この商品 (GDID) GNAME は合計($quantityTotal)です。個人販売数($limit)を超えています。」
     *
     * 返却値:
     *  - ['gdid' => string, 'max' => int] を返す。抽出できない場合は null を返す。
     *
     * 注意:
     *  - GDID は括弧内「この商品 ( ... )」から抽出する。
     *  - 上限数量は「全体販売数(…)」または「個人販売数(…)」の括弧内の数値を抽出する。
     */
    public function getExceededLimitInfo(): ?array
    {
        $m1 = (string) ($this->getMessage1() ?? '');
        if ($m1 === '') {
            return null;
        }

        // GDID を抽出: 「この商品 (XXXX)」
        $gdid = null;
        if (preg_match('/この商品\s*\(\s*([^)]+)\s*\)/u', $m1, $gm)) {
            $gdid = trim($gm[1]);
        }

        // GNAME を抽出: 「この商品 (GDID) GNAME は合計」
        $gdname = null;
        if (preg_match('/この商品\s*\(\s*[^)]+\s*\)\s*(.+?)\s*は合計/u', $m1, $nm)) {
            $gdname = trim($nm[1]);
        }

        // 合計（数量合計）を抽出: 「合計(X)です」
        $quantityTotal = null;
        if (preg_match('/合計\(\s*([0-9]+)\s*\)\s*です/u', $m1, $xm)) {
            $quantityTotal = (int) $xm[1];
        }

        // 上限数量を抽出: 「全体販売数(N)」または「個人販売数(N)」
        $limit = null;
        if (preg_match('/(全体販売数|個人販売数)\(\s*([0-9]+)\s*\)/u', $m1, $mm)) {
            $limit = (int) $mm[2];
        }

        if ($gdid !== null && $limit !== null) {
            return [
                'gdid' => $gdid,
                'gdname' => $gdname,
                'quantityTotal' => $quantityTotal,
                'limit' => $limit,
            ];
        }

        return null;
    }
}
