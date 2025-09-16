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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/*
 * Trait for 商品コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GcodeTrait
{
    /** @var string 商品コード */
    protected ?string $gcode = null;

    /**
     * {@inheritDoc}
     */
    public function getGcode(): ?string
    {
        return $this->gcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setGcode(?string $gcode)
    {
        $this->gcode = $gcode;

        return $this;
    }
}
