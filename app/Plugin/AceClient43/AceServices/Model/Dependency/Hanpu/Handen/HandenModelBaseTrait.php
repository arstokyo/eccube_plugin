<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

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
    public function setHbikou1(?string $hbikou1)
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
    public function setHbikou2(?string $hbikou2)
    {
        $this->hbikou2 = $hbikou2;
        return $this;
    }

}