<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送時間ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait HkCodeTrait
{
    /** @var ?string $hkCode 配送時間ID */
    protected ?string $hkCode = null;

    /**
     * {@inheritDoc}
     */
    public function getHkCode(): ?int
    {
        return $this->hkCode;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkCode(?int $code): static
    {
        $this->hkCode = $code;
        return $this;
    }
}