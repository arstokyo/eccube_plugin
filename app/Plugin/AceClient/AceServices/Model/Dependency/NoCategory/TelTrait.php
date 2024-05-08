<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Tel
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
    public function setTel(?string $tel)
    {
        $this->tel = $tel;
        return $this;
    }
}