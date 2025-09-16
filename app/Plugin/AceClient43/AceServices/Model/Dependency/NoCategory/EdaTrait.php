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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

trait EdaTrait
{
    /** @var ?string 納品先枝番号 */
    protected ?string $eda = null;

    /**
     * {@inheritDoc}
     */
    public function getEda(): ?string
    {
        return $this->eda;
    }

    /**
     * {@inheritDoc}
     */
    public function setEda(?string $eda)
    {
        $this->eda = $eda;

        return $this;
    }
}
