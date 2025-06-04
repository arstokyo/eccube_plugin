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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for HaisoGroupModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HaisoModelGroup1Interface extends NoCategory\HasSimeiInterface, Address\HasAdrInterface, PhoneAndPC\HasTelInterface, Address\HasZipInterface, HasOnameInterface
{
    /**
     * Get 配送先氏名
     */
    public function getSimei(): ?string;

    /**
     * Set 配送先氏名
     */
    public function setSimei(?string $simei);

    /**
     * Get 配送先住所
     */
    public function getAdr(): ?string;

    /**
     * Set 配送先住所
     */
    public function setAdr(?string $adr);

    /**
     * Get 配送先電話番号
     */
    public function getTel(): ?string;

    /**
     * Set 配送先電話番号
     */
    public function setTel(?string $tel);

    /**
     * Get 配送先郵便番号
     */
    public function getZip(): ?string;

    /**
     * Set 配送先郵便番号
     */
    public function setZip(?string $zip);
}
