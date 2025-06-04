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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumon;

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
     * Bumon
     *
     * @var BumonModel[]|null
     */
    protected ?array $bumon = null;

    /**
     * {@inheritDoc}
     */
    public function getBumon(): ?array
    {
        return $this->bumon;
    }

    /**
     * {@inheritDoc}
     */
    public function setBumon(?array $bumon): void
    {
        $this->bumon = $bumon;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'bumon' => BumonModel::class,
        ];
    }
}
