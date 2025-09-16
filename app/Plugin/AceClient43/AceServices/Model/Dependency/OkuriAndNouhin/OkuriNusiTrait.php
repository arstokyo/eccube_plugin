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
 * Trait for 送り主
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OkuriNusiTrait
{
    /** @var ?string 送り主 */
    protected ?string $okurinusi = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurinusi(): ?string
    {
        return $this->okurinusi;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurinusi(?string $okurinusi)
    {
        $this->okurinusi = $okurinusi;

        return $this;
    }
}
