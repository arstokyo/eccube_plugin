<?php


namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Interface for Nmember
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemberInterface 
{

    /**
     * Get 納品先枝番号
     * 
     */
    public function getEda(): ?int;

    /**
     * Set 納品先枝番号
     * 
     */
    public function setEda(?int $eda);

}