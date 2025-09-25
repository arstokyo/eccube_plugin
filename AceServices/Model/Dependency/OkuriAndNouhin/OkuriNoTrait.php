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

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for Okuri
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait OkuriNoTrait
{
    /** @var ?string 送り状番号 */
    protected ?string $okurino = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurino(): ?string
    {
        return $this->okurino;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurino(?string $okurino)
    {
        $this->okurino = $okurino;

        return $this;
    }
}
