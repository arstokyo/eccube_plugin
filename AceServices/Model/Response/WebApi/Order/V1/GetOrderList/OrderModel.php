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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList;

/**
 * Model for Order
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class OrderModel implements OrderModelInterface
{
    /** @var JyudenModel|null */
    protected ?JyudenModel $jyuden = null;

    /** @var JyumeiModel[]|null */
    protected ?array $jyumei = null;

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModel
    {
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(?JyudenModel $jyuden): self
    {
        $this->jyuden = $jyuden;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyumei(): ?array
    {
        return $this->jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyumei(?array $jyumei): self
    {
        $this->jyumei = $jyumei;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Jyumei' => JyumeiModel::class,
        ];
    }
}
