<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetHanpuRirekiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetHanpuRirekiResponseModel extends ResponseModelAbtract implements GetHanpuRirekiResponseModelInterface
{
    /**
     * @var HanpuModelInterface $hanpu
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