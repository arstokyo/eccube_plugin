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

use Eccube\Entity\CartItem;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\JyumeiModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * JyumeiModel に関連する情報をイベントとして保持するクラス
 */
class OnSetJyumeiModelEvent extends Event
{
    public JyumeiModelInterface $jyumeiModel;

    public CartItem $cartItem;

    public array $options;

    /**
     * コンストラクタで必要な情報を初期化
     *
     * @param JyumeiModelInterface $jyumeiModel 対象のJyumeiモデル
     * @param CartItem $cartItem 関連するカートアイテム
     * @param array $options 追加オプション（省略可能）
     */
    public function __construct(JyumeiModelInterface $jyumeiModel, CartItem $cartItem, array $options = [])
    {
        $this->jyumeiModel = $jyumeiModel;
        $this->cartItem = $cartItem;
        $this->options = $options;
    }
}
