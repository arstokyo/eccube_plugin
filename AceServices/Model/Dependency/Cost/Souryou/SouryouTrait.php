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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Souryou;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 送料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SouryouTrait
{
    /** @var ?float 送料 */
    protected ?float $souryou = null;

    /**
     * {@inheritDoc}
     */
    public function getSouryou(): ?float
    {
        return $this->souryou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouryou(?string $souryou)
    {
        $this->souryou = NumberConverter::stringWithCommaToFloat($souryou);

        return $this;
    }
}
