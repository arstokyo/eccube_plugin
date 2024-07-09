<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Interface for HasThreeDbikouh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasThreeDbikouhInterface
{
    /**
    * Get 伝票備考1
    *
    * @return ?string
    */
    public function getDbikouh1(): ?string;

    /**
     * Set 伝票備考1
     *
     * @param ?string $dbikouh1
     * @return $this
     */
    public function setDbikouh1(?string $dbikouh1);

    /**
    * Get 伝票備考2
    *
    * @return ?string
    */
    public function getDbikouh2(): ?string;

    /**
     * Set 伝票備考2
     *
     * @param ?string $dbikouh2
     * @return $this
     */
    public function setDbikouh2(?string $dbikouh2);

    /**
    * Get 伝票備考3
    *
    * @return ?string
    */
    public function getDbikouh3(): ?string;

    /**
     * Set 伝票備考3
     *
     * @param ?string $dbikouh3
     * @return $this
     */
    public function setDbikouh3(?string $dbikouh3);

}