<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 5つ出荷報告ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveFshukkaMailTrait
{
    /** @var ?string $fshukkamail1 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $fshukkamail1 = null;

    /** @var ?string $fshukkamail2 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $fshukkamail2 = null;

    /** @var ?string $fshukkamail3 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $fshukkamail3 = null;

    /** @var ?string $fshukkamail4 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $fshukkamail4 = null;

    /** @var ?string $fshukkamail5 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $fshukkamail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getFShukkaMail1(): ?string
    {
        return $this->fshukkamail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShukkaMail1(?string $fshukkamail1)
    {
        $this->fshukkamail1 = $fshukkamail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShukkaMail2(): ?string
    {
        return $this->fshukkamail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShukkaMail2(?string $fshukkamail2)
    {
        $this->fshukkamail2 = $fshukkamail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShukkaMail3(): ?string
    {
        return $this->fshukkamail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShukkaMail3(?string $fshukkamail3)
    {
        $this->fshukkamail3 = $fshukkamail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShukkaMail4(): ?string
    {
        return $this->fshukkamail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShukkaMail4(?string $fshukkamail4)
    {
        $this->fshukkamail4 = $fshukkamail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFShukkaMail5(): ?string
    {
        return $this->fshukkamail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFShukkaMail5(?string $fshukkamail5)
    {
        $this->fshukkamail5 = $fshukkamail5;
        return $this;
    }

}