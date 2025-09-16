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
 * Trait for 配送時間ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait HkCodeTrait
{
    /** @var ?string 配送時間ID */
    protected ?string $hkcode = null;

    /**
     * {@inheritDoc}
     */
    public function getHkcode(): ?int
    {
        return $this->hkcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkcode(?int $code)
    {
        $this->hkcode = $code;

        return $this;
    }
}
