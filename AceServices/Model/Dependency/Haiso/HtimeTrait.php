<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送希望時間コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HtimeTrait
{
    /** @var ?int $htime 配送希望時間コード */
    protected ?int $htime = null;

    /**
     * {@inheritDoc}
     */
    public function getHtime(): ?int
    {
        return $this->htime;
    }

    /**
     * {@inheritDoc}
     */
    public function setHtime(?int $htime): static
    {
        $this->htime = $htime;
        return $this;
    }
}