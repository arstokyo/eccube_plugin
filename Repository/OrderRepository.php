<?php

namespace Plugin\AceClient43\Repository;

use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Entity\Master\OrderStatus;
use Eccube\Entity\Order;
use Eccube\Repository\AbstractRepository;

/**
 * @method Order|null getPurchaseProcessingOrderWithJoin(string $preOrderId)
 * @method Order|null findOneBy(array $criteria, array|null $orderBy = null)
 */
class OrderRepository extends AbstractRepository
{
    /**
     * CustomerAddressRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function getProcessingOrder(?string $preOrderId = null, bool $shouldJoin = false): ?Order
    {
        if (null === $preOrderId) {
            return null;
        }

        if ($shouldJoin && method_exists($this, 'getPurchaseProcessingOrderWithJoin')) {
            return $this->getPurchaseProcessingOrderWithJoin($preOrderId);
        }

        return $this->findOneBy([
            'pre_order_id' => $preOrderId,
            'OrderStatus' => OrderStatus::PROCESSING,
        ]);
    }
}
