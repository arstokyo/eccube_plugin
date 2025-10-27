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
use Eccube\Annotation\ShoppingFlow;
use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxDisplayType;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\ItemHolderPreprocessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Service\AceConfigService;

/**
 * ポイント値引きを追加する.
 *
 * @ShoppingFlow
 */
class PointDiscountProcessor implements ItemHolderPreprocessor
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    protected AceConfigService $configService;

    private int $taxDisplayTypeId;

    private int $taxTypeId;

    private ?string $productName;

    /**
     * PointDiscountProcessor constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param AceConfigService $configService
     * @param int $taxDisplayTypeId
     * @param int $taxTypeId
     * @param string|null $productName
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        AceConfigService $configService,
        int $taxDisplayTypeId,
        int $taxTypeId,
        ?string $productName = null,
    ) {
        $this->entityManager = $entityManager;
        $this->configService = $configService;
        $this->taxDisplayTypeId = $taxDisplayTypeId;
        $this->taxTypeId = $taxTypeId;
        $this->productName = $productName;
    }

    /**
     * @param ItemHolderInterface|Order $itemHolder
     */
    public function process(ItemHolderInterface $itemHolder, PurchaseContext $context): void
    {
        $config = $this->configService->getConfig();

        $this->removeDiscountItems($itemHolder);
        $this->addPointDiscountItem($itemHolder, $config);
    }

    private function removeDiscountItems(Order $Order): void
    {
        foreach ($Order->getShippings() as $Shipping) {
            foreach ($Shipping->getOrderItems() as $item) {
                if ($item->getProcessorName() == PointDiscountProcessor::class) {
                    $Shipping->removeOrderItem($item);
                    $Order->removeOrderItem($item);
                    $this->entityManager->remove($item);
                }
            }
        }
    }

    /**
     * @param Order $Order
     * @param Config $config
     */
    private function addPointDiscountItem(Order $Order, Config $config): void
    {
        if (!$config->shouldUseAceDiscount() || 0 <= $discount = $Order->getAcePointDiscount()) {
            return;
        }

        $DiscountType = $this->entityManager->find(OrderItemType::class, OrderItemType::DISCOUNT);
        $TaxDisplay = $this->entityManager->find(TaxDisplayType::class, $this->taxDisplayTypeId);
        $Taxation = $this->entityManager->find(TaxType::class, $this->taxTypeId);

        FeeSeparateHelper::separate(
            $discount,
            $Order,
            $DiscountType,
            $TaxDisplay,
            $Taxation,
            PointDiscountProcessor::class,
            $this->productName,
        );
    }
}
