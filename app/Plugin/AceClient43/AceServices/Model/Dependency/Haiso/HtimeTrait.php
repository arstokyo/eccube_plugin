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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送希望時間コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HtimeTrait
{
    /** @var ?int 配送希望時間コード */
    protected ?int $htime = null;

    /**
     * {@inheritDoc}
     */
    public function getHtime(): ?int
    {
        return $this->htime;
    }

    /**
     * {@inheritDoc}
     */
    public function setHtime(?int $htime)
    {
        $this->htime = $htime;

        return $this;
    }
}
