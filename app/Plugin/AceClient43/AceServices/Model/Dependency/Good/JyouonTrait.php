<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Trait for 常温
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JyouonTrait
{

    /** @var ?int $jyouon 常温 */
    protected ?int $jyouon = null;

    /**
     * {@inheritDoc}
     */
    public function getJyouon(): ?int
    {
        return $this->jyouon;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyouon(?int $jyouon)
    {
        $this->jyouon = $jyouon;
        return $this;
    }

}