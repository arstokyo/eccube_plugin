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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/*
 * Trait for 商品ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GdidTrait
{
    /** @var ?string 商品ID */
    protected ?string $gdid = null;

    /**
     * {@inheritDoc}
     */
    public function getGdid(): ?string
    {
        return $this->gdid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGdid(?string $gdid)
    {
        $this->gdid = $gdid;

        return $this;
    }
}
