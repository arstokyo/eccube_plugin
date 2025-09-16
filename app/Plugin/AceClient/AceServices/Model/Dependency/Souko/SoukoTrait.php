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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Souko;

/**
 * Trait for 倉庫コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SoukoTrait
{
    /** @var string 倉庫コード */
    protected ?string $souko = null;

    /**
     * {@inheritDoc}
     */
    public function getSouko(): ?string
    {
        return $this->souko;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouko(?string $souko)
    {
        $this->souko = $souko;

        return $this;
    }
}
