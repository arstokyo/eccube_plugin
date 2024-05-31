<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 電話番号
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait TelTrait
{
    /** @var ?string $tel 電話番号 */
    protected ?string $tel = null;

    /**
     * {@inheritDoc}
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * {@inheritDoc}
     */
    public function setTel(?string $tel): static
    {
        $this->tel = $tel;
        return $this;
    }
}