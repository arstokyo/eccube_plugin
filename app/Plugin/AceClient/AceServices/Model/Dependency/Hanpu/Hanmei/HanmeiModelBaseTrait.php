<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;


/**
 * Trait for HanmeiModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HanmeiModelBaseTrait
{
    use NoCategory\EdaTrait,
        Good\GcodeTrait,
        NoCategory\SuuTrait,
        Cost\Tanka\TankaTrait;

    /** @var ?string $kousin 更新区分 */
    protected ?int $kousin = null;

    /** @var ?string $ksite 明細サイト */
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