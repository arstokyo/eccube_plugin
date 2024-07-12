<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait WebOrderNoTrait
{
    /** @var ?string $weborderno Web上での注文番号 */
    protected ?string $weborderno = null;

    /**
     * {@inheritDoc}
     */
    public function getWeborderno(): ?string
    {
        return $this->weborderno;
    }

    /**
     * {@inheritDoc}
     */
    public function setWeborderno(?string $weborderno)
    {
        $this->weborderno = $weborderno;
        return $this;
    }
}