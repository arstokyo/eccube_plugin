<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait For 5つ注文確認ﾒｰﾙｱﾄﾞﾚｽ
 * 
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FiveForderMailTrait 
{
    /** @var ?string $freeordermail1 注文確認ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeordermail1 = null;

    /** @var ?string $freeordermail2 注文確認ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeordermail2 = null;

    /** @var ?string $freeordermail3 注文確認ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeordermail3 = null;

    /** @var ?string $freeordermail4 注文確認ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeordermail4 = null;

    /** @var ?string $freeordermail5 注文確認ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeordermail5 = null;


    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail1(): ?string
    {
        return $this->freeordermail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail1(?string $freeordermail1): parent
    {
        $this->freeordermail1 = $freeordermail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail2(): ?string
    {
        return $this->freeordermail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail2(?string $freeordermail2): parent
    {
        $this->freeordermail2 = $freeordermail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail3(): ?string
    {
        return $this->freeordermail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail3(?string $freeordermail3): parent
    {
        $this->freeordermail3 = $freeordermail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail4(): ?string
    {
        return $this->freeordermail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail4(?string $freeordermail4): parent
    {
        $this->freeordermail4 = $freeordermail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail5(): ?string
    {
        return $this->freeordermail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail5(?string $freeordermail5): parent
    {
        $this->freeordermail5 = $freeordermail5;
        return $this;
    }
}