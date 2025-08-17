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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface AddCartRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     *
     * @param OrderPrmModel $prm
     *
     * @return AddCartRequestModel
     */
    public function setPrm(OrderPrmModelInterface $prm): self;

    /**
     * Get オーダー情報
     *
     * @return OrderPrmModel
     */
    public function getPrm(): OrderPrmModelInterface;
}
