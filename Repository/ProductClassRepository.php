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

namespace Plugin\AceClient43\Repository;

use Eccube\Entity\ProductClass;
use Eccube\Repository\ProductClassRepository as BaseProductClassRepository;

class ProductClassRepository extends BaseProductClassRepository
{
    /**
     * Aceの商品IDでProductClassを取得する
     *
     * @param string $aceProductId Aceの商品ID
     *
     * @return ProductClass|null
     */
    public function findOneByAceProductId(string $aceProductId): ?ProductClass
    {
        return $this->findOneBy(['ace_product_id' => $aceProductId]);
    }
}
