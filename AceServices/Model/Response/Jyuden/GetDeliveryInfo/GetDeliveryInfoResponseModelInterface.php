<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for GetDeliveryInfo Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDeliveryInfoResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Jyuden
     *
     * @return JyudenModelInterface
     */
    public function getJyuden(): JyudenModelInterface;

    /**
     * Set Jyuden
     *
     * @param JyudenModel $jyuden
     */
    public function setJyuden(JyudenModel $jyuden): void;
}