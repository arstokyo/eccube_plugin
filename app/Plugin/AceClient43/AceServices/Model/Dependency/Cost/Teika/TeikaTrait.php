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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Teika;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 定価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TeikaTrait
{
    /** @var ?float 定価 */
    protected ?float $teika = null;

    /**
     * {@inheritDoc}
     */
    public function getTeika(): ?float
    {
        return $this->teika;
    }

    /**
     * {@inheritDoc}
     */
    public function setTeika(?string $teika)
    {
        $this->teika = NumberConverter::stringWithCommaToFloat($teika);

        return $this;
    }
}
