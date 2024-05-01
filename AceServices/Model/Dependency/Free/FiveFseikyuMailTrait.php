<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 5つ請求明細ﾒｰﾙｱﾄﾞﾚｽ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveFseikyumailTrait
{
    /** @var ?string $fseikyumail1 請求明細ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $fseikyumail1 = null;

    /** @var ?string $fseikyumail2 請求明細ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $fseikyumail2 = null;

    /** @var ?string $fseikyumail3 請求明細ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $fseikyumail3 = null;

    /** @var ?string $fseikyumail4 請求明細ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $fseikyumail4 = null;

    /** @var ?string $fseikyumail5 請求明細ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $fseikyumail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getFSeikyuMail1(): ?string
    {
        return $this->fseikyumail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFSeikyuMail1(?string $fseikyumail1): parent
    {
        $this->fseikyumail1 = $fseikyumail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFSeikyuMail2(): ?string
    {
        return $this->fseikyumail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFSeikyuMail2(?string $fseikyumail2): parent
    {
        $this->fseikyumail2 = $fseikyumail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFSeikyuMail3(): ?string
    {
        return $this->fseikyumail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFSeikyuMail3(?string $fseikyumail3): parent
    {
        $this->fseikyumail3 = $fseikyumail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFSeikyuMail4(): ?string
    {
        return $this->fseikyumail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFSeikyuMail4(?string $fseikyumail4): parent
    {
        $this->fseikyumail4 = $fseikyumail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFSeikyuMail5(): ?string
    {
        return $this->fseikyumail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFSeikyuMail5(?string $fseikyumail5): parent
    {
        $this->fseikyumail5 = $fseikyumail5;
        return $this;
    }

}