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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 *  Okuri Hk Time Response Model
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
class GetOkuriHkTimeResponseModel extends ResponseModelAbtract implements GetOkuriHkTimeResponseModelInterface
{
    /**
     * @var MasterModelInterface
     */
    protected MasterModelInterface $master;

    /**
     * {@inheritDoc}
     */
    public function getMaster(): MasterModelInterface
    {
        return $this->master;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaster(MasterModel $master): void
    {
        $this->master = $master;
    }
}
