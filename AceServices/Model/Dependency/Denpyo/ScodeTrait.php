<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 請求先顧客コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ScodeTrait
{
    /** @var ?string $scode 請求先顧客コード */
    protected ?string $scode = null;

    /**
     * {@inheritDoc}
     */
    public function getScode(): ?string
    {
        return $this->scode;
    }

    /**
     * {@inheritDoc}
     */
    public function setScode(?string $scode): static
    {
        $this->scode = $scode;
        return $this;
    }
}