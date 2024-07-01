<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Interface for 小計
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSyoukeiInterface
{
    /**
    * Get 小計
    *
    * @return float|null
    */
    public function getSyoukei(): ?float;

    /**
    * Set 小計
    *
    * @param string|null $syoukei
    * @return $this
    */
    public function setSyoukei(?string $syoukei): static;

}