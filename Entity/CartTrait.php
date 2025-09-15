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

    /**
     * Aceの受注サポート機能を有効にするかどうか
     *
     * @var bool
     *
     * @ORM\Column(name="enable_ace_order_support", type="boolean", options={"default":false, "comment":"Aceの受注サポート機能を有効にするかどうか"})
     */
    private bool $enable_ace_order_support = false;

    /**
     * Aceの受注サポート機能を有効にする
     *
     * @return $this
     */
    public function enableAceOrderSupport()
    {
        return $this->setEnableAceOrderSupport(true);
    }

    /**
     * Aceの受注サポート機能を無効にする
     *
     * @return $this
     */
    public function disableAceOrderSupport()
    {
        return $this->setEnableAceOrderSupport(false);
    }

    /**
     * use_order_supportの値を取得する
     *
     * @return bool
     */
    public function isAceOrderSupportEnabled(): bool
    {
        return $this->enable_ace_order_support;
    }

    /**
     * Aceの受注サポート機能を有効にするかどうかを設定する
     *
     * @param bool $enable
     *
     * @return $this
     */
    public function setEnableAceOrderSupport(bool $enable)
    {
        $this->enable_ace_order_support = $enable;

        return $this;
    }
}
