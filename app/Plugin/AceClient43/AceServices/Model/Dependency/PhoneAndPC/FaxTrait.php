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
 * Trait for Fax
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FaxTrait
{
    /** @var ?string FAX */
    protected ?string $fax = null;

    /**
     * {@inheritDoc}
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;

        return $this;
    }
}
