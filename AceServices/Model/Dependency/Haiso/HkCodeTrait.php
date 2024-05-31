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
    protected ?string $hkcode = null;

    /**
     * {@inheritDoc}
     */
    public function getHkcode(): ?int
    {
        return $this->hkcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkcode(?int $code): static
    {
        $this->hkcode = $code;
        return $this;
    }
}