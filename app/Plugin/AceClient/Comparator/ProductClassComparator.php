<?php

namespace Plugin\AceClient43\Comparator;

use Eccube\Entity\CartItem;
use Eccube\Service\Cart\ProductClassComparator as BaseProductClassComparator;

/**
 * カートアイテムのプロダクトクラスを比較するサービスのデコレータ.
 *
 * 仕様:
 * - イベント駆動は廃止し、ItemCompareInterface（DI）に委譲して比較を実施。
 * - これにより比較ロジックをプラグイン既定/カスタマイズ実装で差し替えやすくする。
 */
class ProductClassComparator extends BaseProductClassComparator
{
    /** @var ItemCompareInterface */
    protected $itemCompare;

    public function __construct(ItemCompareInterface $itemCompare)
    {
        $this->itemCompare = $itemCompare;
    }

    /**
     * {@inheritDoc}
     */
    public function compare(CartItem $Item1, CartItem $Item2): bool
    {
        // CartItem 同士の比較は ItemCompare に一元化（ProductClass → カスタム属性）
        return $this->itemCompare->compareCartItemWithCartItem($Item1, $Item2);
    }
}
