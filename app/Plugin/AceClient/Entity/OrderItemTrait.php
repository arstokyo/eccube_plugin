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

use Eccube\Annotation\EntityExtension;
use Plugin\AceClient43\Processor\PointDiscountProcessor;
use Plugin\AceClient43\Processor\PromotionDiscountProcessor;

/**
 * @EntityExtension("Eccube\Entity\OrderItem")
 */
trait OrderItemTrait
{
    use BaseItemTrait;

    /**
     * ポイント値引きの明細かどうか
     *
     * @return bool
     */
    public function isPointDiscount(): bool
    {
        return $this->getProcessorName() === PointDiscountProcessor::class;
    }

    /**
     * プロモションの明細かどうか
     * レッドネイルズの場合はセット割引
     *
     * @return bool
     */
    public function isPromotion(): bool
    {
        return $this->getProcessorName() === PromotionDiscountProcessor::class;
    }

    // ShouldIgnoreStockをOrderItemTraitに指定したことで、通販Ace側の在庫チェックを無視できます。
    // public function shouldIgnoreStock(): bool
    // {
    //    return false;
    // }
}
