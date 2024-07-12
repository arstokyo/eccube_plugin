<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for フリー項目区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait KubunTrait
{
    /** @var ?int $kubun フリー項目区分 */
    protected ?int $kubun = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?int $kubun)
    {
        $this->kubun = $kubun;
        return $this;
    }
}