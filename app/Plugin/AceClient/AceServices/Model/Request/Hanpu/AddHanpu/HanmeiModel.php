<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Class HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanmeiModel implements HanmeiModelInterface
{
    use Good\GcodeTrait,
        NoCategory\SuuTrait,
        Cost\Tanka\TankaTrait,
        Cost\Tax\TaxKbnTrait;

    /** @var ?int $kousin 更新区分 */
    protected ?int $kousin = null;

    /** @var ?int $ksite 明細サイト */
    protected ?int $ksite = null;

    /** @var ?int $teiki 定期区分 */
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
    public function setKousin(?int $kousin): static
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
    public function setKsite(?int $ksite): static
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
    public function setTeiki(?int $teiki): static
    {
        $this->teiki = $teiki;
        return $this;
    }
}