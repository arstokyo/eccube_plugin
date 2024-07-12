<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

/**
 * Trait For 3つ代表者電話番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FiveFdenwaBangoTrait
{
    /** @var ?string $freedenwabango1 代表者電話番号1 */
    protected ?string $freedenwabango1 = null;

    /** @var ?string $freedenwabango2 代表者電話番号2 */
    protected ?string $freedenwabango2 = null;

    /** @var ?string $freedenwabango3 代表者電話番号3 */
    protected ?string $freedenwabango3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango1(): ?string
    {
        return $this->freedenwabango1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango1(?string $freedenwabango1)
    {
        $this->freedenwabango1 = $freedenwabango1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango2(): ?string
    {
        return $this->freedenwabango2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango2(?string $freedenwabango2)
    {
        $this->freedenwabango2 = $freedenwabango2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango3(): ?string
    {
        return $this->freedenwabango3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango3(?string $freedenwabango3)
    {
        $this->freedenwabango3 = $freedenwabango3;
        return $this;
    }
}