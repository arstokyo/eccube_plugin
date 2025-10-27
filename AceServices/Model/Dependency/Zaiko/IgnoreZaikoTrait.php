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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Trait for 在庫状況無視 フラグ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait IgnoreZaikoTrait
{
    /** @var ?int 在庫状況無視 フラグ */
    protected ?int $ignorezaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getIgnorezaiko(): ?int
    {
        return $this->ignorezaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setIgnorezaiko(?int $ignorezaiko)
    {
        $this->ignorezaiko = $ignorezaiko;

        return $this;
    }

    public function setIgnorezaikoBoolean(bool $ignorezaiko): void
    {
        $this->ignorezaiko = $ignorezaiko ? 1 : 0;
    }
}
