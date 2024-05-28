<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 時間指定名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HkNameTrait
{
    /** @var ?string $hkName 時間指定名称 */
    protected ?string $hkName = null;

    /**
     * {@inheritDoc}
     */
    public function getHkname(): ?string
    {
        return $this->hkName;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkname(?string $hkName): static
    {
        $this->hkName = $hkName;
        return $this;
    }
}