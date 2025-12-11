<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\Corrector\JyumeiDataCorrectorApplier;

class JyumeiDataConverter implements JyumeiDataConverterInterface
{
    use CreateRequestModelTrait;

    private JyumeiDataCorrectorApplier $jyumeiDataCorrectorApplier;
    private TankaResolverInterface $tankaResolver;
    private ?AddCartFlow $flow = null;

    public function __construct(
        JyumeiDataCorrectorApplier $jyumeiDataCorrectorApplier,
        TankaResolverInterface $tankaResolver,
    ) {
        $this->jyumeiDataCorrectorApplier = $jyumeiDataCorrectorApplier;
        $this->tankaResolver = $tankaResolver;
    }

    /**
     * フローを設定
     *
     * @param AddCartFlow $flow
     *
     * @return self
     */
    public function setFlow(AddCartFlow $flow): self
    {
        $this->flow = $flow;

        return $this;
    }

    /**
     * 現在のフローを取得
     *
     * @return AddCartFlow|null
     */
    public function getFlow(): ?AddCartFlow
    {
        return $this->flow;
    }

    /**
     * Convert CartItem to JyumeiModel
     *
     * @param CartItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertCartItemToJyumei(CartItem $item, array $options = []): RequestAddCart\JyumeiModelInterface
    {
        $productClass = $item->getProductClass();

        // ProductClass を起点に共通項目を設定した JyumeiModel を生成
        $jyumei = $this->preCreateJyumeiFromProductClass($productClass, $item, $options);

        if (method_exists($item, 'shouldIgnoreStock')) {
            $jyumei->setIgnorezaikoBoolean($item->shouldIgnoreStock());
        }

        // CartItem 固有の項目を設定
        $jyumei = $jyumei
            ->setSuu($item->getQuantity())
            ->setRitu($item->getAceMarkupRate());

        if ($this->flow !== null && $this->jyumeiDataCorrectorApplier->hasCorrectors()) {
            $this->jyumeiDataCorrectorApplier->applyForCartItem($item, $jyumei, $this->flow, $options);
        }

        return $jyumei;
    }

    /**
     * Convert OrderItem to JyumeiModel
     *
     * @param OrderItem $item
     * @param array $options
     *
     * @return RequestAddCart\JyumeiModelInterface
     */
    public function convertOrderItemToJyumei(OrderItem $item, array $options = []): RequestAddCart\JyumeiModelInterface
    {
        $productClass = $item->getProductClass();

        // ProductClass を起点に共通項目を設定した JyumeiModel を生成
        $jyumei = $this->preCreateJyumeiFromProductClass($productClass, $item, $options);

        if (method_exists($item, 'shouldIgnoreStock')) {
            $jyumei->setIgnorezaikoBoolean($item->shouldIgnoreStock());
        }

        // OrderItem 固有の項目を設定
        $jyumei = $jyumei
            ->setSuu($item->getQuantity())
            ->setRitu($item->getAceMarkupRate());

        if ($this->flow !== null && $this->jyumeiDataCorrectorApplier->hasCorrectors()) {
            $this->jyumeiDataCorrectorApplier->applyForOrderItem($item, $jyumei, $this->flow, $options);
        }

        return $jyumei;
    }

    /**
     * ProductClass を起点に JyumeiModel を作成（共通項目の事前設定）
     *
     * - Gcode（商品コード）
     * - Tanka（単価）
     * - Taxkbn（税区分）
     *
     * 個別項目（数量・率・在庫無視など）は呼び出し元で設定します。
     *
     * @param ProductClass $pc
     * @param OrderItem|CartItem $item
     * @param array $options
     */
    protected function preCreateJyumeiFromProductClass(ProductClass $pc, $item, array $options): RequestAddCart\JyumeiModelInterface
    {
        /** @var RequestAddCart\JyumeiModelInterface $jyumei */
        $jyumei = $this->createSubModel(RequestAddCart\JyumeiModelInterface::class);

        [$price, $taxKbn] = $this->tankaResolver->resolve($pc, $item, $this->flow, $options);

        return $jyumei
            ->setGcode($pc->getAceProductId())
            ->setTanka($price)
            ->setTaxkbn($taxKbn);
    }

    public function shouldExcludeOrderItem(OrderItem $orderItem, AddCartFlow $flow, bool $isOrderSupportEnabled, ?string $trigger = null): bool
    {
        return $isOrderSupportEnabled && (!$orderItem->isProduct() || $orderItem->isPresent());
    }

    public function shouldExcludeCartItem(CartItem $cartItem, AddCartFlow $flow, bool $isOrderSupportEnabled, ?string $trigger = null): bool
    {
        // デフォルト無視しない。
        return false;
    }
}
