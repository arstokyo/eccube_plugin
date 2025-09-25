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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetDeliveryInfo Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDeliveryInfoResponseModel extends ResponseModelAbtract implements GetDeliveryInfoResponseModelInterface
{
    /**
     * @var JyudenModelInterface
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
