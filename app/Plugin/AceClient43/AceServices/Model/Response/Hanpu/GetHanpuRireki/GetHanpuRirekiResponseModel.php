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

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetHanpuRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHanpuRirekiResponseModel extends ResponseModelAbtract implements GetHanpuRirekiResponseModelInterface
{
    /**
     * @var HanpuModelInterface
     */
    protected HanpuModelInterface $hanpu;

    /**
     * {@inheritDoc}
     */
    public function getHanpu(): HanpuModelInterface
    {
        return $this->hanpu;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanpu(HanpuModel $hanpu): void
    {
        $this->hanpu = $hanpu;
    }
}
