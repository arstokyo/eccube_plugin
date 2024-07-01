<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Trait for CKbn
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait CKbnTrait
{
    /** @var ?int $ckbn キャンペーン区分 */
    protected ?int $ckbn = null;

    /**
     * {@inheritDoc}
     */
    public function getCKbn(): ?int
    {
        return $this->ckbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setCKbn(?int $ckbn): static
    {
        $this->ckbn = $ckbn;
        return $this;
    }
}