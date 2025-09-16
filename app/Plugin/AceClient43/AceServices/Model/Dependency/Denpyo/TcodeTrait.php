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
 * Trait for 担当者コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TcodeTrait
{
    /** @var ?string 担当者コード */
    protected ?string $tcode = null;

    /**
     * {@inheritDoc}
     */
    public function getTcode(): ?string
    {
        return $this->tcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setTcode(?string $tcode)
    {
        $this->tcode = $tcode;

        return $this;
    }
}
