<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;

/**
 * Interface for Has GMODps 取引ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGMODpsTIdInterface
{
    /**
     * Get GMODps 取引ID
     * 
     * @return string|null
     */
    public function getGmodpstid(): ?string;

    /**
     * Set GMODps 取引ID
     * 
     * @param string|null $gmodpstid
     * @return $this
     */
    public function setGmodpstid(?string $gmodpstid);
}