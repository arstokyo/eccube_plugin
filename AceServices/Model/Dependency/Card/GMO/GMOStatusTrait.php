<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;

/**
 * Trait for GMOステータス
 *  
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMOStatusTrait 
{
    
    /** @var ?int $gmostatus GMOステータス */
    protected ?int $gmostatus = null;

    /**
     * {@inheritDoc}
     */
    public function getGmostatus(): ?int
    {
        return $this->gmostatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmostatus(?int $gmostatus)
    {
        $this->gmostatus = $gmostatus;
        return $this;
    }

}