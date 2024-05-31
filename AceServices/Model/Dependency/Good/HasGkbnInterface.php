<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGkbnInterface
{

    /**
     * Get 商品区分
     * 
     * @return int|null
     */
    public function getGkbn(): ?int;

    /**
     * Set 商品区分
     * 
     * @param int|null $gkbn
     * @return $this
     */
    public function setGkbn(?int $gkbn): static;

}