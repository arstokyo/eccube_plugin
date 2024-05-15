<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for Hkname
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HkNameTrait
{
    /** @var ?string $hkname 時間指定名称 */
    protected ?string $hkname = null;

    /**
     * {@inheritDoc}
     */
    public function getHkname(): ?string
    {
        return $this->hkname;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkname(?string $hkname)
    {
        $this->hkname = $hkname;
        return $this;
    }
}