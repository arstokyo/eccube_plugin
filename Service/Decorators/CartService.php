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

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\ProductClass;
use Eccube\Repository\CartRepository;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\ProductClassRepository;
use Eccube\Service\Cart\CartItemAllocator;
use Eccube\Service\Cart\CartItemComparator;
use Eccube\Service\CartService as BaseCartService;
use Eccube\Session\Session;
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnAddProductEvent;
use Plugin\AceClient43\Events\EccubeEvents\OnNewCartEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class CartService extends BaseCartService
{
    private EventDispatcherInterface $eventDispatcher;

    /**
     * CartService constructor.
     */
    public function __construct(
        Session $session,
        EntityManagerInterface $entityManager,
        ProductClassRepository $productClassRepository,
        CartRepository $cartRepository,
        CartItemComparator $cartItemComparator,
        CartItemAllocator $cartItemAllocator,
        OrderRepository $orderRepository,
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker,
        EventDispatcherInterface $eventDispatcher,
    ) {
        parent::__construct($session, $entityManager, $productClassRepository, $cartRepository, $cartItemComparator, $cartItemAllocator, $orderRepository, $tokenStorage, $authorizationChecker);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * カートに商品を追加します.
     *
     * @param $ProductClass ProductClass 商品規格
     * @param $quantity int 数量
     *
     * @return bool 商品を追加できた場合はtrue
     */
    public function addProduct($ProductClass, $quantity = 1)
    {
        if (!$ProductClass instanceof ProductClass) {
            $ProductClassId = $ProductClass;
            $ProductClass = $this->entityManager
                ->getRepository(ProductClass::class)
                ->find($ProductClassId);
            if (is_null($ProductClass)) {
                return false;
            }
        }

        $ClassCategory1 = $ProductClass->getClassCategory1();
        if ($ClassCategory1 && !$ClassCategory1->isVisible()) {
            return false;
        }
        $ClassCategory2 = $ProductClass->getClassCategory2();
        if ($ClassCategory2 && !$ClassCategory2->isVisible()) {
            return false;
        }

        $newItem = new CartItem();
        $newItem->setQuantity($quantity);
        $newItem->setPrice($ProductClass->getPrice02IncTax());
        $newItem->setProductClass($ProductClass);

        $this->eventDispatcher->dispatch(new OnAddProductEvent($newItem), Events::ON_ADD_PRODUCT);

        $allCartItems = $this->mergeAllCartItems([$newItem]);
        $this->restoreCarts($allCartItems);

        return true;
    }

    protected function restoreCarts($cartItems)
    {
        foreach ($this->getCarts() as $Cart) {
            foreach ($Cart->getCartItems() as $i) {
                $this->entityManager->remove($i);
                $this->entityManager->flush();
            }
            $this->entityManager->remove($Cart);
            $this->entityManager->flush();
        }
        $this->carts = [];

        /** @var Cart[] $Carts */
        $Carts = [];

        foreach ($cartItems as $item) {
            $allocatedId = $this->cartItemAllocator->allocate($item);
            $cartKey = $this->createCartKey($allocatedId, $this->getUser());

            if (isset($Carts[$cartKey])) {
                $Cart = $Carts[$cartKey];
                $Cart->addCartItem($item);
                $item->setCart($Cart);
            } else {
                /** @var Cart $Cart */
                $Cart = $this->cartRepository->findOneBy(['cart_key' => $cartKey]);
                if ($Cart) {
                    foreach ($Cart->getCartItems() as $i) {
                        $this->entityManager->remove($i);
                        $this->entityManager->flush();
                    }
                    $this->entityManager->remove($Cart);
                    $this->entityManager->flush();
                }
                $Cart = new Cart();
                $Cart->setCartKey($cartKey);
                $Cart->addCartItem($item);
                $item->setCart($Cart);

                $this->eventDispatcher->dispatch(new OnNewCartEvent($Cart), Events::ON_NEW_CART);

                $Carts[$cartKey] = $Cart;
            }
        }

        $this->carts = array_values($Carts);
    }
}
