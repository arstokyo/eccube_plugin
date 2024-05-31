<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Address;

/**
 * Interface For 4つ住所
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFourAdrInterface
{
    /**
     * Get 住所1
     *
     * @return ?string
     */
    public function getAdr1(): ?string;

    /**
     * Set 住所1
     *
     * @param ?string $adr1
     * @return $this
     */
    public function setAdr1(?string $adr1): static;

    /**
     * Get 住所2
     *
     * @return ?string
     */
    public function getAdr2(): ?string;

    /**
     * Set 住所2
     *
     * @param ?string $adr2
     * @return $this
     */
    public function setAdr2(?string $adr2): static;

    /**
     * Get 住所3
     *
     * @return ?string
     */
    public function getAdr3(): ?string;

    /**
     * Set 住所3
     *
     * @param ?string $adr3
     * @return $this
     */
    public function setAdr3(?string $adr3): static;

    /**
     * Get 住所4
     *
     * @return ?string
     */
    public function getAdr4(): ?string;

    /**
     * Set 住所4
     *
     * @param ?string $adr4
     * @return $this
     */
    public function setAdr4(?string $adr4): static;

}
