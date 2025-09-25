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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送伝票ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait OcodeTrait
{
    /** @var ?string 配送会社名称 */
    protected ?string $ocode = null;

    /**
     * {@inheritDoc}
     */
    public function getOcode(): ?int
    {
        return $this->ocode;
    }

    /**
     * {@inheritDoc}
     */
    public function setOcode(?int $ocode)
    {
        $this->ocode = $ocode;

        return $this;
    }
}
