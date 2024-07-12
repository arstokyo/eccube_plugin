<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 担当者コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTcodeInterface
{
    /**
     * Get 担当者コード
     * 
     * @return ?string
     */
    public function getTcode(): ?string;

    /**
     * Set 担当者コード
     * 
     * @param ?string $tcode
     * @return $this
     */
    public function setTcode(?string $tcode);
    
}