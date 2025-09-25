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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 内税対象額（税込）
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait UTTotalTrait
{
    /** @var ?float 内税対象額（税込） */
    protected ?float $uttotal = null;

    /**
     * {@inheritDoc}
     */
    public function getUttotal(): ?float
    {
        return $this->uttotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setUttotal(?string $uttotal)
    {
        $this->uttotal = NumberConverter::stringWithCommaToFloat($uttotal);

        return $this;
    }
}
