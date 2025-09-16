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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for GetsbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetsbpscustidModel implements GetsbpscustidModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var SbpscustidModel sbpscustid
     */
    private ?SbpscustidModel $sbpscustid = null;

    /**
     * {@inheritDoc}
     */
    public function getSbpscustid(): ?SbpscustidModel
    {
        return $this->sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbpscustid(?SbpscustidModel $sbpscustid): void
    {
        $this->sbpscustid = $sbpscustid;
    }
}
