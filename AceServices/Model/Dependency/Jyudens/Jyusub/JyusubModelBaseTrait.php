<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for Jyusub Model Base
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyusubModelBaseTrait 
{
    use NoCategory\IdTrait,
        NoCategory\McodeTrait,
        Denpyo\ToriKbnTrait,
        Denpyo\DensyuTrait,
        Denpyo\ScodeTrait,
        Denpyo\JcodeTrait,
        Denpyo\MemIdTrait,
        Payment\PcodeTrait,
        Bumon\BumonTrait,
        Card\CardModelLevel1Trait,
        Card\TwoBunKatuTrait,
        Baitai\BcodeTrait,
        Baitai\BkCodeTrait,
        Free\ThreeFcodeTrait,
        Point\PointRituTrait;

    /** @var ?int $smpkbn サンプル区分 */
    protected ?int $smpkbn = null;


    /**
     * {@inheritDoc}
     */
    public function getSmpkbn(): ?int
    {
        return $this->smpkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSmpkbn(?int $smpkbn)
    {
        $this->smpkbn = $smpkbn;
        return $this;
    }

}