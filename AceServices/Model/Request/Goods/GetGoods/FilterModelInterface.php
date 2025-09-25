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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

interface FilterModelInterface
{
    /**
     * Get Value
     *
     * @return string|null
     */
    public function getValue(): ?string;

    /**
     * Set Value
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self;

    /**
     * Get Type
     *
     * @return string|null
     */
    public function getType(): ?string;

    /**
     * Set Type
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self;
}
