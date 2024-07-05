<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Model for カード情報 Group2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CardModelGroup2 extends CardModelGroup1 implements CardModelGroup2Interface
{

    /** @var ?string $inkokyakuid 通販AceSyID */
    protected ?string $inkokyakuid = null;

    /** @var ?string $inchumonid 顧客コード */
    protected ?string $inchumonid = null;

    /** @var ?string $intokushu1 セッションID */
    protected ?string $intokushu1 = null;

    /** @var ?string $intokushu2 枝番号 */
    protected ?string $intokushu2 = null;

    /** @var ?string $ukeno EC受付番号 */
    protected ?string $ukeno = null;

    /**
     * {@inheritDoc}
     */
    public function getInkokyakuid(): ?string
    {
        return $this->inkokyakuid;
    }

    /**
     * {@inheritDoc}
     */
    public function setInkokyakuid(string|null $inkokyakuid): static
    {
        $this->inkokyakuid = $inkokyakuid;
        return $this;
    }
 
    /**
     * {@inheritDoc}
     */
    public function getInchumonid(): ?string
    {
        return $this->inchumonid;
    }

    /**
     * {@inheritDoc}
     */
    public function setInchumonid(string|null $inchumonid): static
    {
        $this->inchumonid = $inchumonid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIntokushu1(): ?string
    {
        return $this->intokushu1;
    }

    /**
     * {@inheritDoc}
     */
    public function setIntokushu1(string|null $intokushu1): static
    {
        $this->intokushu1 = $intokushu1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIntokushu2(): ?string
    {
        return $this->intokushu2;
    }

    /**
     * {@inheritDoc}
     */
    public function setIntokushu2(string|null $intokushu2): static
    {
        $this->intokushu2 = $intokushu2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUkeno(): ?string
    {
        return $this->ukeno;
    }

    /**
     * {@inheritDoc}
     */
    public function setUkeno(string|null $ukeno): static
    {
        $this->ukeno = $ukeno;
        return $this;
    }
}