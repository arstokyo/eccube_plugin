<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 数量
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SuuTrait 
{

    /** @var ?int $suu 数量 */
    protected ?int $suu = null;

    /**
     * {@inheritDoc}
     */
    public function getSuu(): ?int
    {
        return $this->suu;
    }

    /**
     * {@inheritDoc}
     */
    public function setSuu(?int $suu)
    {
        $this->suu = $suu;
        return $this;
    }

}