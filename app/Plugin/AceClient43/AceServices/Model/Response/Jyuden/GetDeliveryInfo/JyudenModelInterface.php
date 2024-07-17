<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;


/**
 * Interface for JyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyudenModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
     * Get Delivery
     *
     * @return DeliveryModel[]|null
     */
    public function getDelivery(): ?array;

    /**
     * Set Delivery
     *
     * @param DeliveryModel[]|null $delivery
     * @return void
     */
    public function setDelivery(?array $delivery): void;
}