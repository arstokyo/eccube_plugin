<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface for Has 3伝票備考
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasThreeDenBikouInterface
{
    /**
     * Get 伝票備考1
     *
     * @return ?string
     */
    public function getDbikou1(): ?string;

    /**
     * Set 伝票備考1
     *
     * @param ?string $dbikou1
     * @return $this
     */
    public function setDbikou1(?string $dbikou1);

    /**
     * Get 伝票備考2
     *
     * @return ?string
     */
    public function getDbikou2(): ?string;

    /**
     * Set 伝票備考2
     *
     * @param ?string $dbikou2
     * @return $this
     */
    public function setDbikou2(?string $dbikou2);

    /**
     * Get 伝票備考3
     *
     * @return ?string
     */
    public function getDbikou3(): ?string;

    /**
     * Set 伝票備考3
     *
     * @param ?string $dbikou3
     * @return $this
     */
    public function setDbikou3(?string $dbikou3);
}