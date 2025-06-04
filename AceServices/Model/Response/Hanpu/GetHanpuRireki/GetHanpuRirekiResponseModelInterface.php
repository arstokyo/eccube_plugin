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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for GetHanpuRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHanpuRirekiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get HanpuModel
     *
     * @return HanpuModelInterface
     */
    public function getHanpu(): HanpuModelInterface;

    /**
     * Set HanpuModel
     *
     * @param HanpuModel $hanpu
     */
    public function setHanpu(HanpuModel $hanpu): void;
}
