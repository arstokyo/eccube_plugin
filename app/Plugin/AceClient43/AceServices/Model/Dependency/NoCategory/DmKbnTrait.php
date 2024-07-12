<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for DM区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DmKbnTrait
{
    /** @var ?int $dmkbn DM区分 */
    protected ?int $dmkbn = null;

    /**
    * {@inheritDoc}
    */
    public function getDmkbn(): ?int
    {
        return $this->dmkbn;
    }

    /**
    * {@inheritDoc}
    */
    public function setDmkbn(?int $dmkbn)
    {
        $this->dmkbn = $dmkbn;
        return $this;
    }
}