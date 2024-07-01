<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送伝票ID
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

interface HasOcodeInterface
{
    /**
     * Get 配送伝票ID Ocode
     * 
     * @return ?int
     */
    public function getOcode(): ?int;


    /**
     * Set 配送伝票ID Ocode
     * 
     * @param ?int $code
     * @return $this
     */
    public function setOcode(?int $code);
}