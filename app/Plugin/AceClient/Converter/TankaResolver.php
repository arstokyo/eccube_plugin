<?php

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\CartItem;
use Eccube\Entity\OrderItem;
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\Entity\Constants\AceTaxType;

final class TankaResolver implements TankaResolverInterface
{
    /**
     * ProductClass を起点に単価/税区分を決定（既定: price02/price02IncTax と AceTaxType を採用）
     *
     * @param ProductClass $pc
     * @param OrderItem|CartItem $item
     * @param AddCartFlow $flow
     * @param array $options
     *
     * @return array{0: float|int, 1: int} [tanka, taxkbn]
     */
    public function resolve(ProductClass $pc, $item, AddCartFlow $flow, array $options): array
    {
        $taxKbn = ($pc->getAceTaxType() ?? AceTaxType::TAX_INCLUDED);
        $price = $taxKbn === AceTaxType::TAX_EXCLUDED ? $pc->getPrice02() : $pc->getPrice02IncTax();

        return [$price, $taxKbn];
    }
}
