<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\Free\FreeGroup1Trait;

/**
 * Trait For FreeGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class FreeGroup2Trait implements HasFreeGroup2Interface
{
    use FreeGroup1Trait;
    /** @var ?int $kessaishubetsu 決済種別種類 */
    protected ?int $kessaishubetsu = null;
    /** @var ?int $freesouryoukubun 送料区分 */
    protected ?int $freesouryoukubun = null;
    /** @var ?string $freedispkbnid 表示区分ID */
    protected ?string $freedispkbnid = null;
    /** @var ?string $freedispkbnname 表示区分名 */
    protected ?string $freedispkbnname = null;
    public function getKessaishubetsu(): ?int
    {
        return $this->kessaishubetsu;
    }
    /**
    * {@inheritDoc}
    */
    public function setKessaishubetsu(?int $kessaishubetsu): static
    {
        $this->kessaishubetsu = $kessaishubetsu;
        return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getFreesouryoukubun(): ?int
    {
        return $this->freesouryoukubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreesouryoukubun(?int $freesouryoukubun): static
    {
        $this->freesouryoukubun = $freesouryoukubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedispkbnid(): ?string
    {
        return $this->freedispkbnid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedispkbnid(?string $freedispkbnid): static
    {
        $this->freedispkbnid = $freedispkbnid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedispkbnname(): ?string
    {
        return $this->freedispkbnname;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedispkbnname(?string $freedispkbnname): static
    {
        $this->freedispkbnname = $freedispkbnname;
        return $this;
    }
}