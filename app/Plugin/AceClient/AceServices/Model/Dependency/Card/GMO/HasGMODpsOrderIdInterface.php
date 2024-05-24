<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;

/**
 * Interface for Has 加盟店取引ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGMODpsOrderIdInterface
{
    /**
     * Get 加盟店取引ID
     * 
     * @return string|null
     */
    public function getGmodpsorderid(): ?string;

    /**
     * Set 加盟店取引ID
     * 
     * @param string|null $gmodpsorderid
     * @return $this
     */
    public function setGmodpsorderid(string|null $gmodpsorderid): static;
}