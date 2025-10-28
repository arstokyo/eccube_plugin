<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;

/**
 * AddCartリクエストの最終補正を行うインターフェース
 *
 * リクエスト構築の最終段階で適用され、ビジネスロジックに基づく
 * 追加の補正や検証を実施します。
 *
 * 適用順序：
 * 1. AddCartRequestConverterによる基本構築
 * 2. ビジネスロジックによる項目設定
 * 3. AddCartRequestCorrector群による最終補正（このインターフェース）
 */
interface AddCartRequestCorrectorInterface
{
    /**
     * AddCartリクエストを補正
     *
     * @param AddCartRequestModelInterface $request 補正対象のリクエストモデル
     * @param AddCartFlow $flow 現在のフロー
     * @param array $context 補正に必要なコンテキスト情報
     *                       例: ['cart' => Cart, 'order' => Order, 'config' => Config]
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function correct(
        AddCartRequestModelInterface $request,
        AddCartFlow $flow,
        array $context,
        array $options = [],
    ): void;

    /**
     * この補正器が指定されたフローをサポートするか判定
     *
     * @param AddCartFlow $flow 判定対象のフロー
     *
     * @return bool サポートする場合true
     */
    public function supports(AddCartFlow $flow): bool;
}
