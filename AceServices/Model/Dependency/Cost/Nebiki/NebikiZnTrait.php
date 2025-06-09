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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Nebiki;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 値引合計
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NebikiZnTrait
{
    /** @var ?float 値引合計 */
    protected ?float $nebikizn = 0;

    /**
     * {@inheritDoc}
     */
    public function getNebikizn(): ?float
    {
        return $this->nebikizn;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebikizn(?string $nebikizn)
    {
        $this->nebikizn = NumberConverter::stringWithCommaToFloat($nebikizn);

        return $this;
    }
}
