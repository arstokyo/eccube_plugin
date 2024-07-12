<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

use Symfony\Component\Serializer\Annotation\SerializedName; 

/**
 * Interface for 在庫状況無視 フラグ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasIgnoreZaikoInterface
{
    /**
     * Get 在庫状況無視 フラグ
     * 
     * @return ?int
     */
    /** @SerializedName("ignore_zaiko") */
    public function getIgnorezaiko(): ?int;

    /**
     * Set 在庫状況無視 フラグ
     * 
     * @param ?int $ignorezaiko
     * @return $this
     */
    /** @SerializedName("ignore_zaiko") */
    public function setIgnorezaiko(?int $ignorezaiko);
    
}