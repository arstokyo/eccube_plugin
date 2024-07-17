<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait For FreeCdTrait
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeCdTrait
{
    use NoCategory\NameTrait,
        Bikou\ThreeNotesTrait,
        NoCategory\KubunTrait;

    /** @var ?string $fcid フリーマスタID */
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