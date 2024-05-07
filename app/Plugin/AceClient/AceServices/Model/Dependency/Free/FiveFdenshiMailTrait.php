<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait For 5つ電子契約送付ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FiveFdenshiMailTrait
{
    /** @var ?string $freedenshimail1 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freedenshimail1 = null;

    /** @var ?string $freedenshimail2 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freedenshimail2 = null;

    /** @var ?string $freedenshimail3 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freedenshimail3 = null;

    /** @var ?string $freedenshimail4 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freedenshimail4 = null;

    /** @var ?string $freedenshimail5 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freedenshimail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeDenshiMail1(): ?string
    {
        return $this->freedenshimail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenshiMail1(?string $freedenshimail1)
    {
        $this->freedenshimail1 = $freedenshimail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenshiMail2(): ?string
    {
        return $this->freedenshimail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenshiMail2(?string $freedenshimail2)
    {
        $this->freedenshimail2 = $freedenshimail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenshiMail3(): ?string
    {
        return $this->freedenshimail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenshiMail3(?string $freedenshimail3)
    {
        $this->freedenshimail3 = $freedenshimail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenshiMail4(): ?string
    {
        return $this->freedenshimail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenshiMail4(?string $freedenshimail4)
    {
        $this->freedenshimail4 = $freedenshimail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenshiMail5(): ?string
    {
        return $this->freedenshimail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenshiMail5(?string $freedenshimail5)
    {
        $this->freedenshimail5 = $freedenshimail5;
        return $this;
    }
}