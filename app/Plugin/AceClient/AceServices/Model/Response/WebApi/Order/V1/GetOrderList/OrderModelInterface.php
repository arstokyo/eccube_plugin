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

    /**
     * 税抜ポイント値引きを取得
     *
     * @return int|null
     */
    public function getPointDiscountExcludedTax(): ?int;

    /**
     * 税込ポイント値引きを取得
     *
     * @return int|null
     */
    public function getPointDiscount(): ?int;

    /**
     * 税抜キャペーン値引きを取得
     *
     * @return int|null
     */
    public function getPromotionDiscountExcludedTax(): ?int;

    /**
     * 税込キャペーン値引きを取得
     *
     * @return int|null
     */
    public function getPromotionDiscount(): ?int;
}
