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
     * @var bool
     *
     * @ORM\Column(name="use_ace_order_support", type="boolean", nullable=true, options={"comment":"ACE顧客ID"})
     */
    private bool $use_ace_order_support = false;

    /**
     * use_order_supportの値を取得する
     *
     * @param bool $use_order_support
     *
     * @return $this
     */
    public function setUseAceOrderSupport(bool $use_order_support)
    {
        $this->use_ace_order_support = $use_order_support;

        return $this;
    }

    /**
     * use_order_supportの値を取得する
     *
     * @return bool|null
     */
    public function getUseAceOrderSupport(): ?bool
    {
        return $this->use_ace_order_support;
    }
}
