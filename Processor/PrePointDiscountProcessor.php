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

namespace Plugin\AceClient43\Processor;

use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Order;
use Eccube\Service\PointHelper;
use Eccube\Service\PurchaseFlow\DiscountProcessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Service\AceConfigService;

/**
 * ポイントの処理の事前準備
 */
class PrePointDiscountProcessor implements DiscountProcessor
{

    private PointHelper $pointHelper;

    private AceConfigService $configService;

    /**
     * PointDiscountProcessor constructor.]
     *
     * @param AceConfigService $configService
     * @param PointHelper $pointHelper
     */
    public function __construct(
        AceConfigService $configService,
        PointHelper $pointHelper,
    ) {
        $this->configService = $configService;
        $this->pointHelper = $pointHelper;
    }

    public function removeDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        // no-op
    }

    public function addDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        // remove-the eccube discount and trigger calculateAll
        $this->pointHelper->removePointDiscountItem($itemHolder);
    }

    private function supports(ItemHolderInterface $itemHolder): bool
    {
        if (!$this->configService->shouldUseAceDiscount()) {
            return false;
        }

        if (!$itemHolder instanceof Order) {
            return false;
        }

        if (!$itemHolder->getCustomer()) {
            return false;
        }

        return true;
    }
}
