<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for JyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyudenModel implements JyudenModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var DeliveryModelInterface[]|null $Delivery Delivery
     */
    private ?array $Delivery = null;

    /**
     * {@inheritDoc}
     */
    public function getDelivery(): ?array
    {
        return $this->Delivery;
    }

    /**
     * {@inheritDoc}
     */
    public function setDelivery(?array $delivery): void
    {
        $this->Delivery = $delivery;
    }
    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Delivery' => DeliveryModel::class
               ];
    }
}