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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaitaiCodeTrait
{
    /** @var ?string 媒体 */
    protected ?string $baitai = null;

    /** @var ?string 管理番号 */
    protected ?string $baifile = null;

    /**
     * {@inheritDoc}
     */
    public function getBaitai(): ?string
    {
        return $this->baitai;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaitai(?string $baitai)
    {
        $this->baitai = $baitai;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBaifile(): ?string
    {
        return $this->baifile;
    }

    /**
     * {@inheritDoc}
     */
    public function setBaifile(?string $baifile)
    {
        $this->baifile = $baifile;

        return $this;
    }
}
