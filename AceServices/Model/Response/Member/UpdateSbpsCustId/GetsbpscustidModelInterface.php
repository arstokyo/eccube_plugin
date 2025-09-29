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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for GetSbpsCustId Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetsbpscustidModelInterface extends HasMessageModelInterface
{
    /**
     * Get Sbpscustid
     *
     * @return SbpscustidModel
     */
    public function getSbpscustid(): ?SbpscustidModel;

    /**
     * Set Sbpscustid
     *
     * @param SbpscustidModel $sbpscustid
     *
     * @return void
     */
    public function setSbpscustid(?SbpscustidModel $sbpscustid): void;
}
