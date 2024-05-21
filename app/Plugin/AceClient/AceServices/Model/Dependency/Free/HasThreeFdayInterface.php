<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つフリー日付
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasThreeFdayInterface
{
    /**
     * Get フリー日付1
     *
     * @return int|null
     */
    public function getFday1(): ?int;

    /**
     * Set フリー日付1
     *
     * @param int|null $fday
     * @return $this
     */
    public function setFday1(?int $fday): static;

    /**
     * Get フリー日付2
     *
     * @return int|null
     */
    public function getFday2(): ?int;

    /**
     * Set フリー日付2
     *
     * @param int|null $fday2
     * @return $this
     */
    public function setFday2(?int $fday2): static;

    /**
     * Get フリー日付3
     *
     * @return int|null
     */
    public function getFday3(): ?int;

    /**
     * Set フリー日付3
     *
     * @param int|null $fday3
     * @return $this
     */
    public function setFday3(?int $fday3): static;
}