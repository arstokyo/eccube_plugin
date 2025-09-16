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
 * Trait for 受注方法コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JcodeTrait
{
    /** @var ?int 受注方法コード */
    protected ?int $jcode = null;

    /**
     * {@inheritDoc}
     */
    public function getJcode(): ?int
    {
        return $this->jcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setJcode(?int $jcode)
    {
        $this->jcode = $jcode;

        return $this;
    }
}
