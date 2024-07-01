<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送伝票ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait OcodeTrait
{
    /** @var ?string $ocode 配送会社名称 */
    protected ?string $ocode = null;

    /**
     * {@inheritDoc}
     */
    public function getOcode(): ?int
    {
        return $this->ocode;
    }

    /**
     * {@inheritDoc}
     */
    public function setOcode(?int $ocode)
    {
        $this->ocode = $ocode;
        return $this;
    }
}