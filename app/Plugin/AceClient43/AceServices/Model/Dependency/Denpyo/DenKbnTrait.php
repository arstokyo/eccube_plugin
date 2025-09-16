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
 * Trait for 伝票区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DenKbnTrait
{
    /** @var ?string 伝票区分 */
    protected ?string $denkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getDenkbn(): ?string
    {
        return $this->denkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenkbn(?string $denkbn)
    {
        $this->denkbn = $denkbn;

        return $this;
    }
}
