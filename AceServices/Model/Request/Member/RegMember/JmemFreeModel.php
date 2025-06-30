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

class JmemFreeModel implements JmemFreeModelInterface
{
    /** @var int */
    private int $kubun;

    /** @var string */
    private string $free;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(int $kubun): self
    {
        $this->kubun = $kubun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree(): string
    {
        return $this->free;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree(string $free): self
    {
        $this->free = $free;

        return $this;
    }
}
