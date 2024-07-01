<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Interface for Has Two 分割
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTwoBunKatuInterface
{
        
    /**
    * Get 分割初回金額
    * 
    * @return int|null
    */
    public function getBun1(): ?int;

    /**
    * Set 分割初回金額
    * 
    * @param int|null $bun1
    * @return $this
    */
    public function setBun1(?int $bun1);

    /**
    * Get 分割初回以外金額
    * 
    * @return int|null
    */
    public function getBun2(): ?int;

    /**
    * Set 分割初回以外金額
    * 
    * @param int|null $bun2
    * @return $this
    */
    public function setBun2(?int $bun2);
}