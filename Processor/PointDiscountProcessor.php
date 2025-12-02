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

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxDisplayType;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Service\PointHelper;
use Eccube\Service\PurchaseFlow\DiscountProcessor;
use Eccube\Service\PurchaseFlow\Processor\TaxProcessor;
use Eccube\Service\PurchaseFlow\ProcessResult;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Service\AceConfigService;

/**
 * ポイント値引きを追加する.
 *
 * Shippingごとに按分し、ポイントアイテムを追加。
 * 通販Aceの仕様デフォルト、税込になっている顧客が多いため、デフォルト税込に設定します。
 */
class PointDiscountProcessor implements DiscountProcessor
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    protected AceConfigService $configService;

    private int $taxDisplayTypeId;

    private int $taxTypeId;

    private TaxProcessor $taxProcessor;

    private string $itemName;

    private PointHelper $pointHelper;

    /**
     * PointDiscountProcessor constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param AceConfigService $configService
     * @param int $taxDisplayTypeId
     * @param int $taxTypeId
     * @param PointHelper $pointHelper
     * @param TaxProcessor $taxProcessor
     * @param string $itemName
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        AceConfigService $configService,
        int $taxDisplayTypeId,
        int $taxTypeId,
        PointHelper $pointHelper,
        TaxProcessor $taxProcessor,
        string $itemName,
    ) {
        $this->entityManager = $entityManager;
        $this->configService = $configService;
        $this->taxDisplayTypeId = $taxDisplayTypeId;
        $this->taxTypeId = $taxTypeId;
        $this->taxProcessor = $taxProcessor;
        $this->pointHelper = $pointHelper;
        $this->itemName = $itemName;
    }

    public function removeDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$this->supports($itemHolder)) {
            return;
        }

        if (!$itemHolder instanceof Order) {
            return;
        }

        foreach ($itemHolder->getShippings() as $Shipping) {
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() === PointDiscountProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $itemHolder->removeOrderItem($item);
                    $this->entityManager->remove($item);
                }
            }
        }

        if ($context->isOrderFlow()) {
            foreach ($itemHolder->getOrderItems() as $item) {
                if ($item->getProcessorName() === PointDiscountProcessor::class) {
                    $itemHolder->removeOrderItem($item);
                    $this->entityManager->remove($item);
                }
            }
        }

        $this->pointHelper->removePointDiscountItem($itemHolder);
    }

    public function addDiscountItem(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$this->supports($itemHolder)) {
            return null;
        }

        if (!$itemHolder instanceof Order) {
            return null;
        }

        if (0 <= $discount = $itemHolder->getAcePointDiscount()) {
            return null;
        }

        if ($itemHolder->getTotal() + $discount < 0) {
            log_warning('[Point_Discount_Processor] 値引き額は利用ポイントがお支払い金額を上回っています。');
            /** @var Order|null $originalOrder */
            $originalOrder = $context->getOriginHolder();
            $itemHolder->setAcePointDiscount($originalOrder ? $originalOrder->getAcePointDiscount() : 0);

            return ProcessResult::warn(trans('ace_client.purchase_flow.over_payment_total'), self::class);
        }

        $DiscountType = $this->entityManager->find(OrderItemType::class, OrderItemType::POINT);
        $TaxDisplay = $this->entityManager->find(TaxDisplayType::class, $this->taxDisplayTypeId);
        $Taxation = $this->entityManager->find(TaxType::class, $this->taxTypeId);

        FeeSeparateHelper::separate(
            $discount,
            $itemHolder,
            $DiscountType,
            $TaxDisplay,
            $Taxation,
            PointDiscountProcessor::class,
            $this->itemName,
        );

        // 通販Aceのポイント値引きは税込であるため、もう一度税額を計算し直します。
        $this->taxProcessor->process($itemHolder, $context);

        return null;
    }

    private function supports(ItemHolderInterface $itemHolder): bool
    {
        if (!$this->configService->shouldUseAceDiscount()) {
            return false;
        }

        if (!$itemHolder->getCustomer()) {
            return false;
        }

        return true;
    }
}
