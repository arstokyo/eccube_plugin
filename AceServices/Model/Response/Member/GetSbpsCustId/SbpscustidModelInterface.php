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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for SbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface SbpscustidModelInterface extends Day\HasDayInterface, NoCategory\HasMbidInterface, Card\HasCedaInterface, NoCategory\HasCustidInterface
{
    /**
     * Get SBPS顧客枝番
     */
    public function getCeda(): ?string;

    /**
     * Set SBPS顧客枝番
     */
    public function setCeda(?string $ceda);
}
