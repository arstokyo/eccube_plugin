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
 * Trait for 伝票番号
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DennoTrait
{
    /** @var int 伝票番号 */
    protected ?int $denno = null;

    /**
     * {@inheritDoc}
     */
    public function getDenno(): ?int
    {
        return $this->denno;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenno(?int $denno)
    {
        $this->denno = $denno;

        return $this;
    }
}
