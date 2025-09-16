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

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 電話番号
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait TelTrait
{
    /** @var ?string 電話番号 */
    protected ?string $tel = null;

    /**
     * {@inheritDoc}
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * {@inheritDoc}
     */
    public function setTel(?string $tel)
    {
        $this->tel = $tel;

        return $this;
    }
}
