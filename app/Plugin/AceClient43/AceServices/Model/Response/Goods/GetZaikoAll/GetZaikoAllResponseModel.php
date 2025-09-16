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
     * @var MasterModelInterface
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
