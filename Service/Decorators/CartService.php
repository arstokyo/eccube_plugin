<?php

namespace Plugin\AceClient43\Service\Decorators;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Entity\Customer;
use Eccube\Entity\ProductClass;
use Eccube\Repository\CartRepository;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\ProductClassRepository;
use Eccube\Service\Cart\CartItemAllocator;
use Eccube\Service\Cart\CartItemComparator;
use Eccube\Service\CartService as BaseCartService;
use Eccube\Session\Session;
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnCartAddProductEvent;
use Plugin\AceClient43\Service\CartOrderSyncService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * カートサービスのデコレータ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CartService extends BaseCartService
{
    protected EventDispatcherInterface $eventDispatcher;

    protected CartOrderSyncService $cartOrderSyncService;

    /**
     * CartService constructor.
     *
     * @param Session $session
     * @param EntityManagerInterface $entityManager
     * @param ProductClassRepository $productClassRepository
     * @param CartRepository $cartRepository
     * @param CartItemComparator $cartItemComparator
     * @param CartItemAllocator $cartItemAllocator
     * @param OrderRepository $orderRepository
     * @param TokenStorageInterface $tokenStorage
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param EventDispatcherInterface $eventDispatcher
     * @param CartOrderSyncService $cartOrderSyncService
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
        CartOrderSyncService $cartOrderSyncService,
    ) {
        parent::__construct($session, $entityManager, $productClassRepository, $cartRepository, $cartItemComparator, $cartItemAllocator, $orderRepository, $tokenStorage, $authorizationChecker);
        $this->eventDispatcher = $eventDispatcher;
        $this->cartOrderSyncService = $cartOrderSyncService;
    }

    /**
     * 現在のカートの配列を取得する.
     *
     * 本サービスのインスタンスのメンバーが空の場合は、DBまたはセッションからカートを取得する
     *
     * @param bool $empty_delete true の場合、商品明細が空のカートが存在した場合は削除する
     * @param bool $shouldJoin true の場合、JOIN されたデータを取得する
     *
     * @return Cart[]
     */
    public function getCarts($empty_delete = false, bool $shouldJoin = false)
    {
        if (null !== $this->carts) {
            if ($empty_delete) {
                $cartKeys = [];
                foreach (array_keys($this->carts) as $index) {
                    $Cart = $this->carts[$index];
                    if ($Cart->getItems()->count() > 0) {
                        $cartKeys[] = $Cart->getCartKey();
                    } else {
                        $this->entityManager->remove($this->carts[$index]);
                        $this->entityManager->flush();
                        unset($this->carts[$index]);
                    }
                }

                $this->session->set('cart_keys', $cartKeys);
            }

            return $this->carts;
        }

        if ($this->getUser()) {
            $this->carts = $shouldJoin
                ? $this->getPersistedCartsWithJoins()
                : $this->getPersistedCarts();
        } else {
            $this->carts = $shouldJoin
                ? $this->getSessionCartsWithJoins()
                : $this->getSessionCarts();
        }

        return $this->carts;
    }

    /**
     * カート情報を取得します.
     *
     * @param bool $shouldJoin カート取得時に結合を行うかどうか
     *
     * @return Cart|null カート情報が存在する場合はCartオブジェクト、存在しない場合はnull
     */
    public function getCart(bool $shouldJoin = false)
    {
        $Carts = $this->getCarts(false, $shouldJoin);

        if (empty($Carts)) {
            return null;
        }

        $cartKeys = $this->session->get('cart_keys', []);
        $Cart = null;
        if (count($cartKeys) > 0) {
            foreach ($Carts as $cart) {
                if ($cart->getCartKey() === current($cartKeys)) {
                    $Cart = $cart;
                    break;
                }
            }
        } else {
            $Cart = $Carts[0];
        }

        return $Cart;
    }

    /**
     * 永続化されたカートを返す (JOIN されたデータを取得)
     *
     * CartItem, ProductClass, ClassCategory を JOIN して取得する永続化されたカートの配列を返します
     *
     * @return Cart[] 永続化されたカートの配列
     */
    public function getPersistedCartsWithJoins(): array
    {
        $user = $this->getUser();

        if (!$user) {
            return [];
        }

        if (!$user instanceof Customer) {
            throw new \RuntimeException('User must be Customer');
        }

        // CartRepositoryにfindPersistedCartsByCustomerWithJoinsメソッドが存在するかチェック
        if (method_exists($this->cartRepository, 'findPersistedCartsByCustomerWithJoins')) {
            return $this->cartRepository->findPersistedCartsByCustomerWithJoins($user);
        }

        // フォールバック: 通常のfindByを使用
        return $this->cartRepository->findBy(['Customer' => $user]);
    }

    /**
     * セッションカートを返す (JOIN されたデータを取得)
     *
     * CartItem, ProductClass, ClassCategory を JOIN して取得するセッションカートの配列を返します
     *
     * @return Cart[] セッションカートの配列
     */
    public function getSessionCartsWithJoins(): array
    {
        $cartKeys = $this->session->get('cart_keys', []);

        if (empty($cartKeys)) {
            return [];
        }

        // CartRepositoryにfindSessionCartsWithJoinsメソッドが存在するかチェック
        if (method_exists($this->cartRepository, 'findSessionCartsWithJoins')) {
            return $this->cartRepository->findSessionCartsWithJoins($cartKeys);
        }

        // フォールバック: 通常のfindByを使用
        return $this->cartRepository->findBy(['cart_key' => $cartKeys], ['id' => 'ASC']);
    }

    /**
     * カートに商品を追加します.
     *
     * @param $ProductClass ProductClass 商品規格
     * @param $quantity int 数量
     * @param array $options オプション
     *
     * @return bool 商品を追加できた場合はtrue
     */
    public function addProduct($ProductClass, $quantity = 1, array $options = [])
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

        if ($this->eventDispatcher->hasListeners(Events::ON_CART_ADD_PRODUCT)) {
            $this->eventDispatcher->dispatch(new OnCartAddProductEvent($newItem, $ProductClass, $options), Events::ON_CART_ADD_PRODUCT);
        }

        $allCartItems = $this->mergeAllCartItems([$newItem]);
        $this->restoreCarts($allCartItems);

        return true;
    }

    protected function restoreCarts($cartItems)
    {
        $prevCart = $this->getCarts()[0] ?? null;
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

                $this->cartOrderSyncService->syncCartFromPrevCart($Cart, $prevCart);

                $Carts[$cartKey] = $Cart;
            }
        }

        $this->carts = array_values($Carts);
    }

    public function removeProduct($ProductClass, array $options = [])
    {
        $removeItem = $options['cart_item_data'] ?? null;

        if (null === $removeItem) {
            // If no specific CartItem is provided, we will create a new one to find and remove
            if (!$ProductClass instanceof ProductClass) {
                $ProductClassId = $ProductClass;
                $ProductClass = $this->entityManager
                    ->getRepository(ProductClass::class)
                    ->find($ProductClassId);
                if (is_null($ProductClass)) {
                    return false;
                }
            }

            $removeItem = new CartItem();
            $removeItem->setPrice($ProductClass->getPrice02IncTax());
            $removeItem->setProductClass($ProductClass);
        }

        $allCartItems = $this->mergeAllCartItems();
        $foundIndex = -1;
        foreach ($allCartItems as $index => $itemInCart) {
            if ($this->cartItemComparator->compare($itemInCart, $removeItem)) {
                $foundIndex = $index;
                break;
            }
        }

        array_splice($allCartItems, $foundIndex, 1);
        $this->restoreCarts($allCartItems);

        return true;
    }
}
