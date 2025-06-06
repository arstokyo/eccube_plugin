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

namespace Plugin\AceClient43\Service;

use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxDisplayType;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Entity\OrderItem;

class FeeSeparateHelper
{
    public static function separate(float $amount, Order $order, OrderItemType $orderItemType, TaxDisplayType $taxDisplayType, TaxType $taxation, $processorName): void
    {
        $shippingCount = $order->getShippings()->count();
        $feePerShipping = $shippingCount > 0 ? floor($amount / $shippingCount) : $amount;
        $remainder = $amount - ($feePerShipping * $shippingCount);

        foreach ($order->getShippings() as $index => $Shipping) {
            $adjustedFee = $feePerShipping + ($index === 0 ? $remainder : 0);

            $OrderItem = new OrderItem();
            $OrderItem->setProductName($orderItemType->getName())
                ->setQuantity(1)
                ->setPrice($adjustedFee)
                ->setOrderItemType($orderItemType)
                ->setOrder($order)
                ->setTaxDisplayType($taxDisplayType)
                ->setTaxType($taxation)
                ->setProcessorName($processorName);

            if ($taxation->getId() === TaxType::NON_TAXABLE) {
                $OrderItem->setTax(0)
                    ->setTaxRate(0)
                    ->setRoundingType(null);
            }

            $order->addItem($OrderItem);
            $Shipping->addOrderItem($OrderItem);
        }
    }
}
