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

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Cart;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * JyumeiModel に関連する情報をイベントとして保持するクラス
 */
class OnSetOrderPrmModelEvent extends Event
{
    public OrderPrmModelInterface $orderPrmModel;

    public Cart $cart;

    public array $options;

    /**
     * コンストラクタで必要な情報を初期化
     *
     * @param OrderPrmModelInterface $orderPrmModel 対象のOrderPrmモデル
     * @param Cart $cart 関連するカート
     * @param array $options 追加オプション（省略可能）
     */
    public function __construct(OrderPrmModelInterface $orderPrmModel, Cart $cart, array $options = [])
    {
        $this->orderPrmModel = $orderPrmModel;
        $this->cart = $cart;
        $this->options = $options;
    }
}
