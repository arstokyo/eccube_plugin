<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Interface for HasThreeDfmemoh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasThreeDfmemohInterface
{
    /**
    * Get 伝票フリーメモ1
    *
    * @return ?string
    */
    public function getDfmemoh1(): ?string;

    /**
     * Set 伝票フリーメモ1
     *
     * @param ?string $dfmemoh1
     * @return $this
     */
    public function setDfmemoh1(?string $dfmemoh1);

    /**
    * Get 伝票フリーメモ2
    *
    * @return ?string
    */
    public function getDfmemoh2(): ?string;

    /**
     * Set 伝票フリーメモ2
     *
     * @param ?string $dfmemoh2
     * @return $this
     */
    public function setDfmemoh2(?string $dfmemoh2);

    /**
    * Get 伝票フリーメモ3
    *
    * @return ?string
    */
    public function getDfmemoh3(): ?string;

    /**
     * Set 伝票フリーメモ3
     *
     * @param ?string $dfmemoh3
     * @return $this
     */
    public function setDfmemoh3(?string $dfmemoh3);

}