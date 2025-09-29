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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

/**
 * Interface for Jyumei
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenFreeModelInterface
{
    /**
     * Get Fmkbn
     *
     * @return int
     */
    public function getFmkbn(): int;

    /**
     * Set Fmkbn
     *
     * @param int $fmkbn
     *
     * @return self
     */
    public function setFmkbn(int $fmkbn): self;

    /**
     * Get Free
     *
     * @return string
     */
    public function getFree(): string;

    /**
     * Set Free
     *
     * @param string $free
     *
     * @return self
     */
    public function setFree(string $free): self;
}
