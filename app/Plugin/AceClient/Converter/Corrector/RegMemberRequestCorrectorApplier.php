<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember\RegMemberRequestModelInterface;
use Plugin\AceClient43\Converter\RegMemberFlow;

/**
 * リクエスト補正器（Corrector）を管理します。
 *
 * 責務：
 * - RegMemberRequestConverterの生成とフロー設定
 */
final class RegMemberRequestCorrectorApplier extends RequestCorrectorApplierAbstract
{
    /**
     * 登録されている全てのRegMemberRequestCorrectorを適用
     *
     * 補正器が存在しない場合は何もしません。
     * 補正器は優先順位（priority）の降順で適用されます。
     *
     * @param RegMemberRequestModelInterface $request 補正対象のリクエスト
     * @param Customer $Customer
     * @param RegMemberFlow $flow フロー情報
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function apply(
        RegMemberRequestModelInterface $request,
        Customer $Customer,
        RegMemberFlow $flow,
        array $options = [],
    ): void {
        /** @var RegMemberRequestCorrectorInterface $corrector */
        foreach ($this->correctors as $corrector) {
            if ($corrector->support($flow)) {
                $corrector->correct($request, $Customer, $flow, $options);
            }
        }
    }
}
