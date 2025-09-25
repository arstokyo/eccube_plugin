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

/**
 * Interface For 4つ Cdv住所
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface HasFourCdvAdrInterface
{
    /**
     * Get Cdv住所1
     *
     * @return ?string
     */
    public function getCnvAdr1(): ?string;

    /**
     * Set Cdv住所1
     *
     * @param ?string $cnvAdr1
     *
     * @return $this
     */
    public function setCnvAdr1(?string $cnvAdr1);

    /**
     * Get Cdv住所2
     *
     * @return ?string
     */
    public function getCnvAdr2(): ?string;

    /**
     * Set Cdv住所2
     *
     * @param ?string $cnvAdr2
     *
     * @return $this
     */
    public function setCnvAdr2(?string $cnvAdr2);

    /**
     * Get Cdv住所3
     *
     * @return ?string
     */
    public function getCnvAdr3(): ?string;

    /**
     * Set Cdv住所3
     *
     * @param ?string $cnvAdr3
     *
     * @return $this
     */
    public function setCnvAdr3(?string $cnvAdr3);

    /**
     * Get Cdv住所4
     *
     * @return ?string
     */
    public function getCnvAdr4(): ?string;

    /**
     * Set Cdv住所4
     *
     * @param ?string $cnvAdr4
     *
     * @return $this
     */
    public function setCnvAdr4(?string $cnvAdr4);
}
