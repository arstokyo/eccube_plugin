<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Trait for 単価区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TankaKbnTrait 
{

    /** @var ?int $tankakbn 単価区分 */
    protected ?int $tankakbn = null;

    /**
     * {@inheritDoc}
     */
    public function getTankakbn(): ?int
    {
        return $this->tankakbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTankakbn(?int $tankakbn)
    {
        $this->tankakbn = $tankakbn;
        return $this;
    }

}