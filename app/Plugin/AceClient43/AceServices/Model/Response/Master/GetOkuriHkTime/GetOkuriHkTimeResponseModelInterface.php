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

use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface for getOkuriHkTime Response Model
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface GetOkuriHkTimeResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Master Model
     *
     * @return MasterModelInterface
     */
    public function getMaster(): MasterModelInterface;

    /**
     * Set Master Model
     *
     * @param MasterModel $master
     *
     * @return void
     */
    public function setMaster(MasterModel $master): void;
}
