<?php

namespace Plugin\AceClient43\Converter\Corrector;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember\RegMemberRequestModelInterface;
use Plugin\AceClient43\Converter\RegMemberFlow;

/**
 * RegMemberリクエストの最終補正を行うインターフェース
 *
 * リクエスト構築の最終段階で適用され、ビジネスロジックに基づく
 * 追加の補正や検証を実施します。
 *
 * 適用順序：
 * 1. ビジネスロジックによる項目設定
 * 2. RegMemberRequest群による最終補正（このインターフェース）
 */
interface RegMemberRequestCorrectorInterface
{
    /**
     * AddCartリクエストを補正
     *
     * @param RegMemberRequestModelInterface $request 補正対象のリクエストモデル
     * @param Customer $Customer
     * @param RegMemberFlow $flow フロー情報
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function correct(
        RegMemberRequestModelInterface $request,
        Customer $Customer,
        RegMemberFlow $flow,
        array $options = [],
    ): void;
}
