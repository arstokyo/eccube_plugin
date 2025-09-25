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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 数量
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SuuTrait
{
    /** @var ?int 数量 */
    protected ?int $suu = null;

    /**
     * {@inheritDoc}
     */
    public function getSuu(): ?int
    {
        return $this->suu;
    }

    /**
     * {@inheritDoc}
     */
    public function setSuu(?int $suu)
    {
        $this->suu = $suu;

        return $this;
    }
}
