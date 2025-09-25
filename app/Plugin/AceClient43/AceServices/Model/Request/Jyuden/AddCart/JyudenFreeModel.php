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
 * Model for JyudenFree
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyudenFreeModel implements JyudenFreeModelInterface
{
    /** @var int */
    private int $fmkbn;

    /** @var string */
    private string $free;

    /**
     * {@inheritDoc}
     */
    public function getFmkbn(): int
    {
        return $this->fmkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmkbn(int $fmkbn): self
    {
        $this->fmkbn = $fmkbn;

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
