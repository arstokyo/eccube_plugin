<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetGoodsBunruiResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsBunruiResponseModel extends ResponseModelAbtract implements GetGoodsBunruiResponseModelInterface
{
    /**
     * @var MasterModelInterface $Master
     */
    protected MasterModelInterface $Master;

    /**
     * {@inheritDoc}
     */
    public function getMaster(): MasterModelInterface
    {
        return $this->Master;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaster(MasterModel $master): void
    {
        $this->Master = $master;
    }
}