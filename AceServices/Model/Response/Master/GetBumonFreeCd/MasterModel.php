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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreeCd;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * FreeCd
     *
     * @var FreeCdModel[]|null
     */
    protected ?array $freeCd = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeCd(): ?array
    {
        return $this->freeCd;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeCd(?array $freeCd): void
    {
        $this->freeCd = $freeCd;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'FreeCd' => FreeCdModel::class,
        ];
    }
}
