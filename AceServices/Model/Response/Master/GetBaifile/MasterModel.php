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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaifile;

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
     * Baifile
     *
     * @var BaifileModel[]|null
     */
    protected ?array $baifile = null;

    /**
     * {@inheritDoc}
     */
    public function getBaifile(): ?array
    {
        return $this->baifile;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaifile(?array $baifile): void
    {
        $this->baifile = $baifile;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'baifile' => BaifileModel::class,
        ];
    }
}
