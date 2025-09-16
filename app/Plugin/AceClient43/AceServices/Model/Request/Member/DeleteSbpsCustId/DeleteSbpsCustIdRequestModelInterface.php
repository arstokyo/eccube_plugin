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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface DeleteSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DeleteSbpsCustIdRequestModelInterface extends RequestModelInterface, NoCategory\HasSyidInterface, NoCategory\HasMbidInterface, Card\HasCedaInterface
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
