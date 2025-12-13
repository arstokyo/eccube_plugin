<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;

/**
 * JyumeiModel（通販Aceレスポンス）からCartItemへの基本変換実装
 *
 * プラグインの標準的な変換ロジックを提供します。
 * カスタマイズ側でデコレートすることで、拡張フィールドの設定を追加できます。
 */
final class JyumeiToItemConverter implements JyumeiToItemConverterInterface
{
    /**
     * {@inheritDoc}
     */
    public function updateCartItemFromJyumei(CartItem $cartItem, JyumeiModelInterface $jyumei): void
    {
        // 数量を更新
        $cartItem->setQuantity($jyumei->getSuuAsString());

        // 税込単価を更新
        $cartItem->setPrice($jyumei->getPreferTintankaAsString());

        // 同期済みフラグを設定（変更検知を抑制）
        $cartItem->setDirty(false);
        $cartItem->skipMarkDirty = true;
    }

    /**
     * {@inheritDoc}
     */
    public function createCartItemFromJyumei(JyumeiModelInterface $jyumei): CartItem
    {
        $cartItem = new CartItem();

        // isPresentを設定
        $cartItem->setIsPresent($jyumei->isPresent());

        // 税込単価を設定（DBのdecimalと一致するよう文字列へ正規化）
        $cartItem->setPrice($jyumei->getPreferTintankaAsString());

        // 初期状態では変更なしとしてマーク
        $cartItem->setDirty(false);

        return $cartItem;
    }
}
