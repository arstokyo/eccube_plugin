<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;

/**
 * リクエスト補正器（Corrector）を管理します。
 *
 * 責務：
 * - AddCartRequestCorrectorの適用管理
 */
final class AddCartRequestCorrectorApplier extends RequestCorrectorApplierAbstract
{
    /**
     * 登録されている全てのAddCartRequestCorrectorを適用
     *
     * 補正器が存在しない場合は何もしません。
     * 指定されたフローをサポートする補正器のみが適用されます。
     * 補正器は優先順位（priority）の降順で適用されます。
     *
     * @param AddCartRequestModelInterface $request 補正対象のリクエスト
     * @param AddCartFlow $flow 現在のフロー
     * @param array $context 補正コンテキスト
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function apply(
        AddCartRequestModelInterface $request,
        AddCartFlow $flow,
        array $context,
        array $options = [],
    ): void {
        /** @var AddCartRequestCorrectorInterface $corrector */
        foreach ($this->correctors as $corrector) {
            if ($corrector->supports($flow)) {
                $corrector->correct($request, $flow, $context, $options);
            }
        }
    }
}
