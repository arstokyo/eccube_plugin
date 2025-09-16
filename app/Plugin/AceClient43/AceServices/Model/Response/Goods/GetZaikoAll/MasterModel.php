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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaikoAll;

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
     * @var GoodModel[]|null Goods
     */
    private ?array $Goods = null;

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

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Goods' => GoodModel::class,
        ];
    }
}
