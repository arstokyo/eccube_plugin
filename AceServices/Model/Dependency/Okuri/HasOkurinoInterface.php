<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Okuri;

/**
 * Interface for Has 送り状番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasOkurinoInterface
{
    /**
    * Get 送り状番号
    *
    * @return ?string
    */
    public function getOkurino(): ?string;

    /**
     * Set 送り状番号
     *
     * @param ?string $okurino
     */
    public function setOkurino(?string $okurino);

}