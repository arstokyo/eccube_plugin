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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait For FreeCdTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeCdTrait
{
    use NoCategory\NameTrait;
    use Bikou\ThreeNotesTrait;
    use NoCategory\KubunTrait;

    /** @var ?string フリーマスタID */
    protected ?string $fcid = null;

    /**
     * {@inheritDoc}
     */
    public function getFcid(): ?string
    {
        return $this->fcid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcid(?string $fcid)
    {
        $this->fcid = $fcid;

        return $this;
    }
}
