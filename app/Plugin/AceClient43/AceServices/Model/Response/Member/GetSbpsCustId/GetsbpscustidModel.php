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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetSbpsCustId;

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
     * @var SbpscustidModel[]|null sbpscustid
     */
    private ?array $sbpscustid = null;

    /**
     * {@inheritDoc}
     */
    public function getSbpscustid(): ?array
    {
        return $this->sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbpscustid(?array $sbpscustid): void
    {
        $this->sbpscustid = $sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['sbpscustid' => SbpscustidModel::class];
    }
}
