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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanmeiModel implements HanmeiModelInterface
{
    use Good\GcodeTrait;
    use NoCategory\SuuTrait;
    use Cost\Tanka\TankaTrait;
    use Cost\Tax\TaxKbnTrait;

    /** @var ?int 更新区分 */
    protected ?int $kousin = null;

    /** @var ?int 明細サイト */
    protected ?int $ksite = null;

    /** @var ?int 定期区分 */
    protected ?int $teiki = null;

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

    /**
     * {@inheritDoc}
     */
    public function getTeiki(): ?int
    {
        return $this->teiki;
    }

    /**
     * {@inheritDoc}
     */
    public function setTeiki(?int $teiki)
    {
        $this->teiki = $teiki;

        return $this;
    }
}
