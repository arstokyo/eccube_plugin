<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for 荷物個数
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OkuriSuuTrait 
{

    /** @var ?int $okurisuu 荷物個数 */
    protected ?int $okurisuu = null;

    /**
     * {@inheritDoc}
     */
    public function getOkurisuu(): ?int
    {
        return $this->okurisuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkurisuu(?int $okurisuu)
    {
        $this->okurisuu = $okurisuu;
        return $this;
    }

}