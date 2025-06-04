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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFreeCd;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface GetMemberFreeCd Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberFreeCdResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Master
     *
     * @return MasterModel
     */
    public function getMaster(): MasterModel;

    /**
     * Set Master
     *
     * @return void
     */
    public function setMaster(MasterModel $master): void;
}
