<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票番号
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DennoTrait 
{
    /** @var int $denno 伝票番号 */
    protected ?int $denno = null;

    /**
     * {@inheritDoc}
     */
    public function getDenno(): ?int
    {
        return $this->denno;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenno(?int $denno)
    {
        $this->denno = $denno;
        return $this;
    }
}