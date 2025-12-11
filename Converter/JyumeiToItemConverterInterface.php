<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;

/**
 * JyumeiModel（通販Aceレスポンス）からCartItemへの変換インターフェース
 *
 * 通販AceのAddCartレスポンスに含まれるJyumei（受注明細）情報を、
 * EC-CUBEのCartItemエンティティへ変換する責務を持ちます。
 */
interface JyumeiToItemConverterInterface
{
    /**
     * 既存のCartItemをJyumeiModelの情報で更新する
     *
     * 通販Aceとの同期時に、既存カートアイテムの数量・価格等を
     * Jyumeiの内容で上書き更新します。
     *
     * @param CartItem $cartItem 更新対象のカートアイテム
     * @param JyumeiModelInterface $jyumei 更新元のJyumei情報
     *
     * @return void
     */
    public function updateCartItemFromJyumei(CartItem $cartItem, JyumeiModelInterface $jyumei): void;

    /**
     * JyumeiModelから新しいCartItemを作成する
     *
     * 通販Aceとの同期時に、カートに存在しない明細を新規追加する際に使用します。
     * ProductClassの設定は呼び出し側で行うため、このメソッドでは
     * Jyumei固有の属性（数量・価格・カスタムフィールド等）のみを設定します。
     *
     * @param JyumeiModelInterface $jyumei 作成元のJyumei情報
     *
     * @return CartItem 作成されたカートアイテム（ProductClassは未設定）
     */
    public function createCartItemFromJyumei(JyumeiModelInterface $jyumei): CartItem;
}
