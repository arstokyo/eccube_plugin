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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var GoodModelInterface[]|null Good
     */
    private ?array $Good = null;

    /**
     * {@inheritDoc}
     */
    public function getGood(): ?array
    {
        return $this->Good;
    }

    /**
     * {@inheritDoc}
     */
    public function setGood(?array $good): void
    {
        $this->Good = $good;
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
