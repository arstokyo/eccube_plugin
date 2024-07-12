<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 5つ携帯電話区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveKeiKbnTrait
{
    /** @var ?int $keikbn1 携帯電話区分1 */
    protected ?int $keikbn1 = null;

    /** @var ?int $keikbn2 携帯電話区分2 */
    protected ?int $keikbn2 = null;

    /** @var ?int $keikbn3 携帯電話区分3 */
    protected ?int $keikbn3 = null;

    /** @var ?int $keikbn4 携帯電話区分4 */
    protected ?int $keikbn4 = null;

    /** @var ?int $keikbn5 携帯電話区分5 */
    protected ?int $keikbn5 = null;

    /**
     * {@inheritDoc}
     */
    public function getKeiKbn1(): ?int
    {
        return $this->keikbn1;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeiKbn1(?int $keikbn1)
    {
        $this->keikbn1 = $keikbn1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeiKbn2(): ?int
    {
        return $this->keikbn2;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeiKbn2(?int $keikbn2)
    {
        $this->keikbn2 = $keikbn2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeiKbn3(): ?int
    {
        return $this->keikbn3;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeiKbn3(?int $keikbn3)
    {
        $this->keikbn3 = $keikbn3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeiKbn4(): ?int
    {
        return $this->keikbn4;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeiKbn4(?int $keikbn4)
    {
        $this->keikbn4 = $keikbn4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeiKbn5(): ?int
    {
        return $this->keikbn5;
    }

    /**
     * {@inheritDoc}
     */
    public function setKeiKbn5(?int $keikbn5)
    {
        $this->keikbn5 = $keikbn5;
        return $this;
    }
}
