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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Payment;

/**
 * Trait for Pname
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PnameTrait
{
    /** @var ?string 支払予定方法 */
    protected ?string $pname = null;

    /**
     * {@inheritDoc}
     */
    public function getPname(): ?string
    {
        return $this->pname;
    }

    /**
     * {@inheritDoc}
     */
    public function setPname(?string $pname)
    {
        $this->pname = $pname;

        return $this;
    }
}
