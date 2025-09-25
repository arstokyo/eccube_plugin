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

namespace Plugin\AceClient43\AceServices\Model\Response\Master2\GetHaisouDay;

use Plugin\AceClient43\AceServices\Model\Response\AsSpecificNodeResponseInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Get Haisou Day Response Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GetHaisouDayResponseModelInterface extends ResponseModelInterface, AsSpecificNodeResponseInterface
{
    /**
     * Get Day
     *
     * @return ?int
     */
    public function getDay(): ?int;

    /**
     * Set Day
     *
     * @param ?int $day
     */
    /** @SerializedName("getHaisouDayResult") */
    public function setDay(?int $day): void;
}
