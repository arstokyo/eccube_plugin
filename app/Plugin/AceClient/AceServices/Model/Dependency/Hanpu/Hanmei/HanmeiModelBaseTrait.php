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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Hanmei;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for HanmeiModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HanmeiModelBaseTrait
{
    use NoCategory\EdaTrait;
    use Good\GcodeTrait;
    use NoCategory\SuuTrait;
    use Cost\Tanka\TankaTrait;

    /** @var ?string 更新区分 */
    protected ?int $kousin = null;

    /** @var ?string 明細サイト */
    protected ?int $ksite = null;

    /**
     * {@inheritDoc}
     */
    public function getKousin(): ?int
    {
        return $this->kousin;
    }

    /**
     * {@inheritDoc}
     */
    public function setKousin(?int $kousin)
    {
        $this->kousin = $kousin;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKsite(): ?int
    {
        return $this->ksite;
    }

    /**
     * {@inheritDoc}
     */
    public function setKsite(?int $ksite)
    {
        $this->ksite = $ksite;

        return $this;
    }
}
