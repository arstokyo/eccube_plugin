<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリーメモ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFmemoInterface
{
    /**
     * Get メモ1
     *
     * @return ?string
     */
    public function getFmemo1(): ?string;

    /**
     * Set メモ1
     *
     * @param ?string $fmemo1
     * @return $this
     */
    public function setFmemo1(?string $fmemo1): static;

    /**
     * Get メモ2
     *
     * @return ?string
     */
    public function getFmemo2(): ?string;

    /**
     * Set メモ2
     *
     * @param ?string $fmemo2
     * @return $this
     */
    public function setFmemo2(?string $fmemo2): static;

    /**
     * Get メモ3
     *
     * @return ?string
     */
    public function getFmemo3(): ?string;

    /**
     * Set メモ3
     *
     * @param ?string $fmemo3
     * @return $this
     */
    public function setFmemo3(?string $fmemo3): static;
}