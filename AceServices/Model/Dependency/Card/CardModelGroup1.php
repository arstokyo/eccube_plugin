<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Model for カード情報 Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CardModelGroup1 extends CardModelLevel2 implements CardModelGroup1Interface
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

    /** @var ?string $pgtmemid PGT顧客ID */
    protected ?string $pgtmemid = null;

    /** @var ?string $pgtmemcdid PGT顧客カードID */
    protected ?string $pgtmemcdid = null;

    /** @var ?string $pgttid PGT取引ID */
    protected ?string $pgttid = null;

    /** @var ?string $pgtid PGT決済ID */
    protected ?string $pgtid = null;

    /** @var ?string $pgticls PGTイシュア区分 */
    protected ?string $pgticls = null;

    /** @var ?string $gmocardeda GMOカード有効期限 */
    protected ?string $gmocardeda = null;

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

    /**
     * {@inheritDoc}
     */
    public function getPgtmemid(): ?string
    {
        return $this->pgtmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtmemid(string|null $pgtmemid): static
    {
        $this->pgtmemid = $pgtmemid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtmemcdid(): ?string
    {
        return $this->pgtmemcdid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtmemcdid(string|null $pgtmemcdid): static
    {
        $this->pgtmemcdid = $pgtmemcdid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgttid(): ?string
    {
        return $this->pgttid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgttid(string|null $pgttid): static
    {
        $this->pgttid = $pgttid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtid(): ?string
    {
        return $this->pgtid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtid(string|null $pgtid): static
    {
        $this->pgtid = $pgtid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgticls(): ?string
    {
        return $this->pgticls;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgticls(string|null $pgticls): static
    {
        $this->pgticls = $pgticls;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmocardeda(): ?string
    {
        return $this->gmocardeda;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmocardeda(string|null $gmocardeda): static
    {
        $this->gmocardeda = $gmocardeda;
        return $this;
    }

}