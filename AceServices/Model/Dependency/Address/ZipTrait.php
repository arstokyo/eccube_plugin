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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

use Plugin\AceClient43\Util\Converter\PostalCodeConverter;

/**
 * Trait for Zip
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ZipTrait
{
    /** @var ?string 郵便番号 */
    protected ?string $zip = null;

    /**
     * {@inheritDoc}
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function getZipEccubeFormat(): ?string
    {
        return $this->zip ? PostalCodeConverter::FromAceFormat($this->zip) : null;
    }

    /**
     * {@inheritDoc}
     */
    public function setZip(?string $zip)
    {
        $this->zip = $zip ? PostalCodeConverter::ToAceFormat($zip) : null;

        return $this;
    }
}
