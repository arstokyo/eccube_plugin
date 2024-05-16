<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has Two 納品書備考
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTwoNBikouInterface
{
    
    /**
    * Get 納品書備考1
    * 
    * @return string|null
    */
    public function getNbikou1(): ?string;

    /**
    * Set 納品書備考1
    * 
    * @param string|null $nbikou1
    * @return $this
    */
    public function setNbikou1(?string $nbikou1): static;

    /**
    * Get 納品書備考2
    * 
    * @return string|null
    */
    public function getNbikou2(): ?string;

    /**
    * Set 納品書備考2
    * 
    * @param string|null $nbikou2
    * @return $this
    */
    public function setNbikou2(?string $nbikou2): static;

}