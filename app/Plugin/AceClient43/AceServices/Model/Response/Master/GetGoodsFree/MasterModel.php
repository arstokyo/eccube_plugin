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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFree;

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
     * GoodsFree
     *
     * @var GoodsFreeModel[]|null
     */
    protected ?array $goodsFree = null;

    /**
     * {@inheritDoc}
     */
    public function getGoodsFree(): ?array
    {
        return $this->goodsFree;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoodsFree(?array $goodsFree): void
    {
        $this->goodsFree = $goodsFree;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'GoodsFree' => GoodsFreeModel::class,
        ];
    }
}
