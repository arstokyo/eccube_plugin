<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Constants\AceTaxType;

class JyumeiDataConverter implements JyumeiDataConverterInterface
{
    use CreateRequestModelTrait;

    private ?AddCartFlow $flow = null;

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
        $jyumei = $this->preCreateJyumeiFromProductClass($productClass);

        if (method_exists($item, 'shouldIgnoreStock')) {
            $jyumei->setIgnorezaikoBoolean($item->shouldIgnoreStock());
        }

        // CartItem 固有の項目を設定
        return $jyumei
            ->setSuu($item->getQuantity())
            ->setRitu($item->getAceMarkupRate());
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
        $jyumei = $this->preCreateJyumeiFromProductClass($productClass);

        if (method_exists($item, 'shouldIgnoreStock')) {
            $jyumei->setIgnorezaikoBoolean($item->shouldIgnoreStock());
        }

        // OrderItem 固有の項目を設定
        return $jyumei
            ->setSuu($item->getQuantity())
            ->setRitu($item->getAceMarkupRate());
    }

    /**
     * Determine tax type
     *
     * @param int $taxType
     *
     * @return int
     */
    protected function determineTaxType(int $taxType): int
    {
        switch ($taxType) {
            case TaxType::TAXATION:
                return AceTaxType::TAX_INCLUDED;
            case TaxType::TAX_EXEMPT:
                return AceTaxType::TAX_EXEMPT;
            default:
                return AceTaxType::TAX_EXCLUDED;
        }
    }

    /**
     * ProductClass を起点に単価/税区分を決定（既定: price02/price02IncTax と AceTaxType を採用）
     *
     * @return array{0: float|int, 1: int} [tanka, taxkbn]
     */
    protected function resolveTankaAndTaxKbnFromProductClass(ProductClass $pc): array
    {
        $taxKbn = ($pc->getAceTaxType() ?? AceTaxType::TAX_INCLUDED);
        $price = $taxKbn === AceTaxType::TAX_EXCLUDED ? $pc->getPrice02() : $pc->getPrice02IncTax();

        return [$price, $taxKbn];
    }

    /**
     * ProductClass を起点に JyumeiModel を作成（共通項目の事前設定）
     *
     * - Gcode（商品コード）
     * - Tanka（単価）
     * - Taxkbn（税区分）
     *
     * 個別項目（数量・率・在庫無視など）は呼び出し元で設定します。
     */
    protected function preCreateJyumeiFromProductClass(ProductClass $pc): RequestAddCart\JyumeiModelInterface
    {
        /** @var RequestAddCart\JyumeiModelInterface $jyumei */
        $jyumei = $this->createSubModel(RequestAddCart\JyumeiModelInterface::class);

        [$price, $taxKbn] = $this->resolveTankaAndTaxKbnFromProductClass($pc);

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
