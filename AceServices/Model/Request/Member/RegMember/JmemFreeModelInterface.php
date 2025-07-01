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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

interface JmemFreeModelInterface
{
    /**
     * Get kubun
     *
     * @return int
     */
    public function getKubun(): int;

    /**
     * Set kubun
     *
     * @param int $kubun
     *
     * @return self
     */
    public function setKubun(int $kubun): self;

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
