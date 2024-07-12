<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

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
     * @return Response\Hanpu\GetHanpuRireki\HanpuModelInterface
     */
    public function getHanpu(): HanpuModelInterface;

    /**
     * Set HanpuModel
     *
     * @param Response\Hanpu\GetHanpuRireki\HanpuModel $hanpu
     */
    public function setHanpu(HanpuModel $hanpu): void;
}