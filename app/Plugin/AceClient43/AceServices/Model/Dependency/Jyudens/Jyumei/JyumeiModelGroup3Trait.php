<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;

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
        Cost\Tanka\NineTankaTrait,
        NoCategory\KbnTrait;

    /** @var ?string $detailmsg 詳細メッセージ */
    private ?string $detailmsg = null;

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
