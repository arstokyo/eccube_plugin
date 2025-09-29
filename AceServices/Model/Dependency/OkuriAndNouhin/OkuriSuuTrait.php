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
 * Trait for 荷物個数
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OkuriSuuTrait
{
    /** @var ?int 荷物個数 */
    protected ?int $okurisuu = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurisuu(): ?int
    {
        return $this->okurisuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurisuu(?int $okurisuu)
    {
        $this->okurisuu = $okurisuu;

        return $this;
    }
}
