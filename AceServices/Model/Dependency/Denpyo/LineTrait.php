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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 行番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait LineTrait
{
    /** @var ?int 行番号 */
    protected ?int $line = null;

    /**
     * {@inheritDoc}
     */
    public function getLine(): ?int
    {
        return $this->line;
    }

    /**
     * {@inheritDoc}
     */
    public function setLine(?int $line)
    {
        $this->line = $line;

        return $this;
    }
}
