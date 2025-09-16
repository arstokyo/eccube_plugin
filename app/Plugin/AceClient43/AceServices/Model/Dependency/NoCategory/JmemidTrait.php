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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 受注顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JmemidTrait
{
    /** @var ?string 受注顧客ID */
    protected ?string $jmemid = null;

    /**
     * {@inheritDoc}
     */
    public function getJmemid(): ?string
    {
        return $this->jmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmemid(?string $jmemid)
    {
        $this->jmemid = $jmemid;

        return $this;
    }
}
