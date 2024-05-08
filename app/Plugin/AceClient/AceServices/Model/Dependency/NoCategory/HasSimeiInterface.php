<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Simei
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSimeiInterface
{
        
    /**
    * Get 氏名
    * 
    * @return string|null
    */
    public function getSimei(): ?string;

    /**
    * Set 氏名
    * 
    * @param string|null $simei
    */
    public function setSimei(?string $simei);
}