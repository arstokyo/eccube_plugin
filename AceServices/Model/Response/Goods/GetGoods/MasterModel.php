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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var Model\Dependency\Good\GoodModelGroup1Interface[]|null Goods
     */
    private ?array $Goods = null;

    /**
     * @var Model\Dependency\Good\GoodTankaModelGroup1Interface[]|null Gtanka
     */
    private ?array $Gtanka = null;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): ?array
    {
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(?array $goods): void
    {
        $this->Goods = $goods;
    }

    public function hasGoods(): bool
    {
        return !empty($this->Goods);
    }

    /**
     * {@inheritDoc}
     */
    public function getGtanka(): ?array
    {
        return $this->Gtanka;
    }

    /**
     * @return bool
     */
    public function hasGtanka(): bool
    {
        return !empty($this->Gtanka);
    }

    /**
     * {@inheritDoc}
     */
    public function setGtanka(?array $gtanka): void
    {
        $this->Gtanka = $gtanka;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Goods' => GoodsModel::class,
            'Gtanka' => GoodsTankaModel::class,
        ];
    }
}
