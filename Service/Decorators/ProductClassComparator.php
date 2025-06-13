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

namespace Plugin\AceClient43\Service\Decorators;

use Eccube\Entity\CartItem;
use Eccube\Service\Cart\ProductClassComparator as BaseProductClassComparator;
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnCompareCartItemProductClassEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * カートアイテムのプロダクトクラスを比較するサービスのデコレータ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ProductClassComparator extends BaseProductClassComparator
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritDoc}
     */
    public function compare(CartItem $Item1, CartItem $Item2): bool
    {
        if ($this->eventDispatcher->hasListeners(Events::ON_COMPARE_CART_ITEM_PRODUCT_CLASS)) {
            $event = new OnCompareCartItemProductClassEvent($Item1, $Item2);
            $this->eventDispatcher->dispatch($event, Events::ON_COMPARE_CART_ITEM_PRODUCT_CLASS);

            if ($event->isHandled) {
                return $event->isEqual;
            }
        }

        return ProductClassComparator::isProductClassIdEqual($Item1, $Item2);
    }

    /**
     * カートアイテムのプロダクトクラスIDが等しいかどうかを比較する
     *
     * @param CartItem $Item1
     * @param CartItem $Item2
     *
     * @return bool
     */
    public static function isProductClassIdEqual(CartItem $Item1, CartItem $Item2): bool
    {
        $ProductClass1 = $Item1->getProductClass();
        $ProductClass2 = $Item2->getProductClass();
        $product_class_id1 = $ProductClass1 ? (string) $ProductClass1->getId() : null;
        $product_class_id2 = $ProductClass2 ? (string) $ProductClass2->getId() : null;

        return $product_class_id1 === $product_class_id2;
    }
}
