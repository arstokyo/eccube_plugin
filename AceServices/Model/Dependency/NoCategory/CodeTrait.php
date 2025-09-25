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
 * Trait for 顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CodeTrait
{
    /**
     * 顧客コード
     *
     * @var ?string
     */
    protected ?string $code = null;

    /**
     * {@inheritDoc}
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode(?string $code)
    {
        $this->code = $code;

        return $this;
    }
}
