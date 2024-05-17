<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait WebOrdernoTrait
{
    /** @var ?string $webOrderno Web上での注文番号 */
    protected ?string $webOrderno = null;

    /**
     * {@inheritDoc}
     */
    public function getWebOrderno(): ?string
    {
        return $this->webOrderno;
    }

    /**
     * {@inheritDoc}
     */
    public function setWebOrderno(?string $webOrderno)
    {
        $this->webOrderno = $webOrderno;
        return $this;
    }
}