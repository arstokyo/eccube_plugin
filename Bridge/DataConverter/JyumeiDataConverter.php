<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\CartItem;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\OrderItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart as RequestAddCart;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Entity\Constants\AceTaxType;

class JyumeiDataConverter implements JyumeiDataConverterInterface
{
    use CreateRequestModelTrait;

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

        /** @var RequestAddCart\JyumeiModelInterface $jyumei */
        $jyumei = $this->createSubModel(RequestAddCart\JyumeiModelInterface::class);

        return $jyumei
            ->setGcode($productClass->getAceProductId())
            ->setSuu($item->getQuantity())
            ->setTanka($item->getPrice())
            ->setTaxkbn($item->getAceTaxType())
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

        // Determine tax type logic
        $taxKbn = $this->determineTaxType($item->getTaxType()->getId());
        $price = $taxKbn === AceTaxType::TAX_EXCLUDED
            ? $item->getPrice()
            : $item->getPriceIncTax();

        /** @var RequestAddCart\JyumeiModelInterface $jyumei */
        $jyumei = $this->createSubModel(RequestAddCart\JyumeiModelInterface::class);

        return $jyumei
            ->setGcode($productClass->getAceProductId())
            ->setSuu($item->getQuantity())
            ->setTanka($price)
            ->setIgnorezaiko($item->isAceIgnoreStock())
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
}
