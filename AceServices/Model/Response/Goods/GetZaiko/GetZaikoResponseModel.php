<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetZaikoResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetZaikoResponseModel extends ResponseModelAbtract implements GetZaikoResponseModelInterface
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