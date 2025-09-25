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
 * Trait for 携帯固有ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MobileIdTrait
{
    /** @var ?string 携帯固有ID */
    protected ?string $mobileid = null;

    /**
     * {@inheritDoc}
     */
    public function getMobileId(): ?string
    {
        return $this->mobileid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMobileId(?string $mobileid)
    {
        $this->mobileid = $mobileid;

        return $this;
    }
}
