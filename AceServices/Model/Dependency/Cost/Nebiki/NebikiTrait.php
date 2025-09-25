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
 * Trait for NebikiTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NebikiTrait
{
    /** @var ?float 値引額 */
    protected ?float $nebiki = null;

    /**
     * {@inheritDoc}
     */
    public function getNebiki(): ?float
    {
        return $this->nebiki;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebiki(?string $nebiki)
    {
        $this->nebiki = NumberConverter::stringWithCommaToFloat($nebiki);

        return $this;
    }
}
