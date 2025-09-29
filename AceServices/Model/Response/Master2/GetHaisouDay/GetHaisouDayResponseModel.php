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

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Get Haisou Day Response Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetHaisouDayResponseModel extends ResponseModelAbtract implements GetHaisouDayResponseModelInterface
{
    /** @var ?int */
    protected ?int $day = null;

    /**
     * {@inheritDoc}
     */
    public function getDay(): ?int
    {
        return $this->day;
    }

    /**
     * {@inheritDoc}
     */
    public function setDay(?int $day): void
    {
        $this->day = $day;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchSpecificResponseNodeName(): string
    {
        return 'getHaisouDayResponse';
    }
}
