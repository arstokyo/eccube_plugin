<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Trait HandenModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HandenModelBaseTrait
{
    use Day\DayTrait,
    Denpyo\TcodeTrait,
    Denpyo\JcodeTrait,
    Payment\PcodeTrait,
    Baitai\BcodeTrait,
    Baitai\BkCodeTrait,
    Bumon\BumonTrait,
    Souko\SoukoTrait,
    Haiso\HcodeTrait,
    Haiso\HtimeTrait,
    Free\ThreeFcodeTrait,
    Bikou\TwoNBikouTrait,
    Bikou\TwoOBikouTrait;

    /** @var ?string $hbikou1 頒布伝票備考1 */
    protected ?string $hbikou1 = null;

    /** @var ?string $hbikou2 頒布伝票備考2 */
    protected ?string $hbikou2 = null;

    /**
     * {@inheritDoc}
     */
    public function getHbikou1(): ?string
    {
        return $this->hbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setHbikou1(?string $hbikou1): static
    {
        $this->hbikou1 = $hbikou1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHbikou2(): ?string
    {
        return $this->hbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setHbikou2(?string $hbikou2): static
    {
        $this->hbikou2 = $hbikou2;
        return $this;
    }

}