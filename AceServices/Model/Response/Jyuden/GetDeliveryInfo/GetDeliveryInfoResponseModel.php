<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetDeliveryInfo Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDeliveryInfoResponseModel extends ResponseModelAbtract implements GetDeliveryInfoResponseModelInterface
{
    /**
     * @var JyudenModelInterface $Jyuden
     */
    protected JyudenModelInterface $Jyuden;

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): JyudenModelInterface
    {
        return $this->Jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(JyudenModel $jyuden): void
    {
        $this->Jyuden = $jyuden;
    }
}