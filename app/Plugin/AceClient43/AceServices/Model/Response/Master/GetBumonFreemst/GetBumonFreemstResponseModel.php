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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreemst;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetBumonFreemstResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetBumonFreemstResponseModel extends ResponseModelAbtract implements GetBumonFreemstResponseModelInterface
{
    /**
     * Master
     *
     * @var MasterModel
     */
    protected MasterModel $master;

    /**
     * @return MasterModel
     */
    public function getMaster(): MasterModel
    {
        return $this->master;
    }

    /**
     * @param MasterModel $master
     */
    public function setMaster(MasterModel $master): void
    {
        $this->master = $master;
    }
}
