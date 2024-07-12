<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaikoAll;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetZaikoAllResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoAllResponseModel extends ResponseModelAbtract implements GetZaikoAllResponseModelInterface
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