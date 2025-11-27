<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder\CreateOrderRequestModelInterface;

/**
 * リクエスト補正器（Corrector）を管理します。
 *
 * 責務：
 * - CreateOrderRequestConverterの生成とフロー設定
 */
final class CreateOrderRequestCorrectApplier extends RequestCorrectApplierAbstract
{
    /**
     * 登録されている全てのCreateOrderRequestCorrectorを適用
     *
     * 補正器が存在しない場合は何もしません。
     * 補正器は優先順位（priority）の降順で適用されます。
     *
     * @param CreateOrderRequestModelInterface $request 補正対象のリクエスト
     * @param array $context 補正コンテキスト
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function apply(
        CreateOrderRequestModelInterface $request,
        array $context,
        array $options = [],
    ): void {
        /** @var CreateOrderRequestCorrectorInterface $corrector */
        foreach ($this->correctors as $corrector) {
            $corrector->correct($request, $context, $options);
        }
    }
}
