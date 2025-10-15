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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V2\GetOrderListV2;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for OrderModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface OrderModelInterface extends AsListDenormalizableInterface
{
    /**
     * @return JyudenModel|null
     */
    public function getJyuden(): ?JyudenModel;

    /**
     * @param JyudenModel|null $jyuden
     *
     * @return self
     */
    public function setJyuden(?JyudenModel $jyuden): self;

    /**
     * @return JyumeiModel[]|null
     */
    public function getJyumei(): ?array;

    /**
     * @param JyumeiModel[]|null $jyumei
     *
     * @return self
     */
    public function setJyumei(?array $jyumei): self;
}
