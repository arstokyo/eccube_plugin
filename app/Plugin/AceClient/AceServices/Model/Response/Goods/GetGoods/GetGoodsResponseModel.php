<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetGoodsResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsResponseModel extends ResponseModelAbtract implements GetGoodsResponseModelInterface
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