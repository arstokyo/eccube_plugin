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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\Cart")
 */
trait CartTrait
{
    use BaseCartOrderTrait;

    public function hasDirtyItem(): bool
    {
        // いずれかのカートアイテムが「未確定(Dirty)」の場合は購入フローへ進ませない
        foreach ($this->getCartItems() as $CartItem) {
            if (!$CartItem->isPresent() && $CartItem->isDirty()) {
                return true;
            }
        }

        return false;
    }
}
