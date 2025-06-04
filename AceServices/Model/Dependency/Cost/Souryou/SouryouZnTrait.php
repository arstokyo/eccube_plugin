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
 * Trait for Has 送料合計
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SouryouZnTrait
{
    /** @var ?float 送料合計 */
    protected ?float $souryouzn = null;

    /**
     * {@inheritDoc}
     */
    public function getSouryouzn(): ?float
    {
        return $this->souryouzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouryouzn(?string $souryouzn)
    {
        $this->souryouzn = NumberConverter::stringWithCommaToFloat($souryouzn);

        return $this;
    }
}
