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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai;

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
     * Baitai
     *
     * @var BaitaiModel[]|null
     */
    protected ?array $baitai = null;

    /**
     * {@inheritDoc}
     */
    public function getBaitai(): ?array
    {
        return $this->baitai;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaitai(?array $baitai): void
    {
        $this->baitai = $baitai;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'baitai' => BaitaiModel::class,
        ];
    }
}
