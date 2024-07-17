<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Trait for 冷凍
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ReitouTrait
{

    /** @var ?int $reitou 冷凍 */
    protected ?int $reitou = null;

    /**
     * {@inheritDoc}
     */
    public function getReitou(): ?int
    {
        return $this->reitou;
    }

    /**
     * {@inheritDoc}
     */
    public function setReitou(?int $reitou)
    {
        $this->reitou = $reitou;
        return $this;
    }

}