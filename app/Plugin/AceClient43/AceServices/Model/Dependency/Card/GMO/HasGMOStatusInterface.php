<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;

/**
 * Interface for Has GMOステータス
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGMOStatusInterface
{

    /**
     * Get GMOステータス
     * 
     * @return int|null
     */
    public function getGmostatus(): ?int;

    /**
     * Set GMOステータス
     * 
     * @param int|null $gmostatus
     * @return $this
     */
    public function setGmostatus(?int $gmostatus);
}
