<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;

/**
 * CreateOrderリクエストの最終補正を行うインターフェース
 *
 * リクエスト構築の最終段階で適用され、ビジネスロジックに基づく
 * 追加の補正や検証を実施します。
 *
 * 適用順序：
 * 1. CreateOrderRequestConverterによる基本構築
 * 2. ビジネスロジックによる項目設定
 * 3. CreateOrderCorrector群による最終補正（このインターフェース）
 */
interface CreateOrderRequestCorrectorInterface
{
    /**
     * AddCartリクエストを補正
     *
     * @param CreateOrderRequestModelInterface $request 補正対象のリクエストモデル
     * @param array $context 補正に必要なコンテキスト情報
     *                       例: ['cart' => Cart, 'order' => Order, 'config' => Config]
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function correct(
        CreateOrderRequestModelInterface $request,
        array $context,
        array $options = [],
    ): void;
}
