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
use Plugin\AceClient43\Service\CartOrderSyncService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * カートサービスのデコレータ
 *
 * 目的:
 * - 既存の addProduct/removeProduct は、全明細の再構築（restoreCarts）に依存しており、
 *   大量の DELETE/INSERT と広範なロック取得を引き起こすため、性能劣化やデッドロックの原因となり得る。
 * - 本デコレータでは options['skip_restore_cart']=true を受け取った場合、restoreCarts を呼ばずに
 *   既存のカート/明細へ差分適用（in-place 更新）を行う。
 *
 * 効果:
 * - 書き込み量とロック競合を抑制し、同期処理（syncCart）時の安定性とスループットを改善。
 *
 * 注意:
 * - skip_restore_cart は addProduct/removeProduct の呼び出し元で明示的に指定する。
 * - flush タイミングは呼び出し側で制御（CartService::save など）する前提。
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
     * options 仕様:
     * - skip_restore_cart (bool): true の場合、restoreCarts を呼び出さず、既存カートへ差分適用で追加します。
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

        // cart_item_data が CartItem の場合のみ反映する
        $cartItemData = $options['cart_item_data'] ?? null;
        if ($cartItemData instanceof CartItem) {
            // プラグイン側の責務: isPresent と税込価格
            $this->setCartItemFromCartItemData($newItem, $cartItemData, $options);
        }

        // 差分適用（restoreCartsをスキップ）
        if (!empty($options['skip_restore_cart'])) {
            return $this->inPlaceAdd($newItem, $ProductClass);
        }

        // 従来の再構築パス
        $allCartItems = $this->mergeAllCartItems([$newItem]);
        $this->restoreCarts($allCartItems);

        return true;
    }

    /**
     * cart_item_data に基づき、新規追加する CartItem に必要な属性を反映します.
     *
     * 役割（プラグイン側）:
     * - isPresent フラグの反映
     * - 税込価格（price）の反映
     *
     * 注意:
     * - PriceExcludeTax やギフト系の付与はカスタマイズ側で行います（責務分離）。
     *
     * @param CartItem      $item           追加対象の CartItem
     * @param CartItem $cartItemData   オプションで渡される元データ
     * @param array         $options        追加時のオプション
     */
    protected function setCartItemFromCartItemData(CartItem $item, CartItem $cartItemData, array $options): void
    {
        // プレゼント判定（フラグ）
        $item->setIsPresent($cartItemData->isPresent());

        // 未確定にマークする
        $item->markDirty();

        // 税込価格（基本価格）。未設定であれば既定の ProductClass 価格が利用される
        if (null !== $cartItemData->getPrice()) {
            $item->setPrice($cartItemData->getPrice());
        }
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

    /**
     * カートから商品を削除します.
     *
     * options 仕様:
     * - skip_restore_cart (bool): true の場合、restoreCarts を呼び出さず、既存カートから対象明細のみを削除します。
     * - cart_item_data (?CartItem): 削除対象の CartItem が特定済みの場合に直接指定できます。
     */
    public function removeProduct($ProductClass, array $options = [])
    {
        $removeItem = $options['cart_item_data'] ?? null;

        // 差分適用（restoreCartsをスキップ）
        if (!empty($options['skip_restore_cart'])) {
            return $this->inPlaceRemove($ProductClass, $removeItem);
        }

        // 従来の再構築パス
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

    /**
     * 差分適用で明細を追加する（restoreCarts 不使用）.
     *
     * @param CartItem $newItem 追加対象の一時アイテム（数量/価格は ProductClass に基づく）
     * @param ProductClass $ProductClass
     *
     * @return bool
     */
    protected function inPlaceAdd(CartItem $newItem, ProductClass $ProductClass): bool
    {
        $Cart = $this->getCart(true);

        // カートが存在しない場合は新規作成
        if (!$Cart) {
            $Cart = new Cart();
            // 既存のキー生成仕様に倣い、割り当てIDを使ってキーを生成
            $allocatedId = $this->cartItemAllocator->allocate($newItem);
            $cartKey = $this->createCartKey($allocatedId, $this->getUser());
            $Cart->setCartKey($cartKey);
            $Cart->addCartItem($newItem);
            $newItem->setCart($Cart);

            $this->entityManager->persist($Cart);
            $this->entityManager->persist($newItem);

            return true;
        }

        // 既存明細にマージ（同一明細があれば数量加算＋価格更新）
        foreach ($Cart->getCartItems() as $itemInCart) {
            if ($this->cartItemComparator->compare($itemInCart, $newItem)) {
                $itemInCart->setQuantity($itemInCart->getQuantity() + $newItem->getQuantity());
                if (null !== $newItem->getPrice()) {
                    $itemInCart->setPrice($newItem->getPrice());
                }
                $this->entityManager->persist($itemInCart);

                return true;
            }
        }

        // 見つからなければ新規明細として追加
        $Cart->addCartItem($newItem);
        $newItem->setCart($Cart);
        $this->entityManager->persist($newItem);

        return true;
    }

    /**
     * 差分適用で明細を削除する（restoreCarts 不使用）.
     *
     * @param ProductClass|mixed $ProductClass
     * @param CartItem|null $removeItem
     *
     * @return bool
     */
    protected function inPlaceRemove($ProductClass, ?CartItem $removeItem): bool
    {
        // cart_item_data が指定されていればそれを優先して削除
        if ($removeItem instanceof CartItem) {
            $Cart = $removeItem->getCart();
            if ($Cart) {
                $Cart->removeItem($removeItem);
            }
            $this->entityManager->remove($removeItem);

            return true;
        }

        // 指定が無ければ、現在のカートから比較して該当明細を探す
        if (!$ProductClass instanceof ProductClass) {
            $ProductClassId = $ProductClass;
            $ProductClass = $this->entityManager
                ->getRepository(ProductClass::class)
                ->find($ProductClassId);
            if (is_null($ProductClass)) {
                return false;
            }
        }

        $probe = new CartItem();
        $probe->setPrice($ProductClass->getPrice02IncTax());
        $probe->setProductClass($ProductClass);

        $Cart = $this->getCart(true);
        if (!$Cart) {
            return false;
        }

        foreach ($Cart->getCartItems() as $itemInCart) {
            if ($this->cartItemComparator->compare($itemInCart, $probe)) {
                $Cart->removeItem($itemInCart);
                $this->entityManager->remove($itemInCart);

                return true;
            }
        }

        // 該当なし
        return false;
    }
}
