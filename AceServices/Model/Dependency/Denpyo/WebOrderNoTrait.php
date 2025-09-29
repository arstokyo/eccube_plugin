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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait WebOrderNoTrait
{
    /** @var ?string Web上での注文番号 */
    protected ?string $weborderno = null;

    /**
     * {@inheritDoc}
     */
    public function getWeborderno(): ?string
    {
        return $this->weborderno;
    }

    /**
     * {@inheritDoc}
     */
    public function setWeborderno(?string $weborderno)
    {
        $this->weborderno = $weborderno;

        return $this;
    }
}
