<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 5つ商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveFshouhinMailTrait
{
    /** @var ?string $fshouhinmail1 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $fshouhinmail1 = null;

    /** @var ?string $fshouhinmail2 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $fshouhinmail2 = null;

    /** @var ?string $fshouhinmail3 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $fshouhinmail3 = null;

    /** @var ?string $fshouhinmail4 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $fshouhinmail4 = null;

    /** @var ?string $fshouhinmail5 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $fshouhinmail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getFShouhinMail1(): ?string
    {
        return $this->fshouhinmail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShouhinMail1(?string $fshouhinmail1): static
    {
        $this->fshouhinmail1 = $fshouhinmail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShouhinMail2(): ?string
    {
        return $this->fshouhinmail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShouhinMail2(?string $fshouhinmail2): static
    {
        $this->fshouhinmail2 = $fshouhinmail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShouhinMail3(): ?string
    {
        return $this->fshouhinmail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShouhinMail3(?string $fshouhinmail3): static
    {
        $this->fshouhinmail3 = $fshouhinmail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShouhinMail4(): ?string
    {
        return $this->fshouhinmail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShouhinMail4(?string $fshouhinmail4): static
    {
        $this->fshouhinmail4 = $fshouhinmail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShouhinMail5(): ?string
    {
        return $this->fshouhinmail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShouhinMail5(?string $fshouhinmail5): static
    {
        $this->fshouhinmail5 = $fshouhinmail5;
        return $this;
    }

}