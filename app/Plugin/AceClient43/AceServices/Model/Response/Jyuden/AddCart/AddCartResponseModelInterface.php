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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for AddCartResponseModel.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AddCartResponseModelInterface extends Response\ResponseModelInterface
{
    /**
     * Get order
     *
     * @return OrderModel
     */
    public function getOrder(): OrderModelInterface;

    /**
     * Set order
     *
     * @param OrderModelInterface $order
     *
     * @return void
     */
    public function setOrder(OrderModelInterface $order): void;
}
