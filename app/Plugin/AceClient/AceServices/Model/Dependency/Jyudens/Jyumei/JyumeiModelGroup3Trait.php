<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Trait for Jyumei Group3
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyumeiModelGroup3Trait
{
    use Good\SubNameTrait,
        Good\GkbnTrait,
        NoCategory\TwoImagesTrait,
        Cost\Tanka\NineTankaTrait;

    /** @var ?int $kbn 区分 */
    private ?int $kbn = null;

    /** @var ?string $detailmsg 詳細メッセージ */
    private ?string $detailmsg = null;

    /**
     * {@inheritDoc}
     */
    public function getKbn(): ?int
    {
        return $this->kbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setKbn(?int $kbn)
    {
        $this->kbn = $kbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDetailmsg(): ?string
    {
        return $this->detailmsg;
    }

    /**
     * {@inheritDoc}
     */
    public function setDetailmsg(?string $detailmsg)
    {
        $this->detailmsg = $detailmsg;
        return $this;
    }
  
}
