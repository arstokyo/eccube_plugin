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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Model for Decision Cart Response
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DecisionCartResponseModel extends Response\ResponseModelAbtract implements DecisionCartResponseModelInterface
{
    /** @var OrderModelInterface */
    private OrderModelInterface $order;

    /**
     * {@inheritDoc}
     */
    public function getOrder(): OrderModelInterface
    {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(OrderModel $order): void
    {
        $this->order = $order;
    }
}
