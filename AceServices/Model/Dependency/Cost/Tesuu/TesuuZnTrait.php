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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tesuu;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 手数料合計
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TesuuZnTrait
{
    /** @var ?float 手数料合計 */
    protected ?float $tesuuzn = 0;

    /**
     * {@inheritDoc}
     */
    public function getTesuuzn(): ?float
    {
        return $this->tesuuzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuuzn(?string $tesuuzn)
    {
        $this->tesuuzn = NumberConverter::stringWithCommaToFloat($tesuuzn);

        return $this;
    }
}
