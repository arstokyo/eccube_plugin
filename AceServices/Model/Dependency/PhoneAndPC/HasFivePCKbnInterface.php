<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface For PC区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFivePCKbnInterface
{
    /**
     * Get PC区分 1
     *
     * @return ?int
     */
    public function getPckbn1(): ?int;

    /**
     * Set PC区分 1
     *
     * @param ?int $pckbn1
     * @return $this
     */
    public function setPckbn1(?int $pckbn1): static;

    /**
     * Get PC区分 2
     *
     * @return ?int
     */
    public function getPckbn2(): ?int;

    /**
     * Set PC区分 2
     *
     * @param ?int $pckbn2
     * @return $this
     */
    public function setPckbn2(?int $pckbn2): static;

    /**
     * Get PC区分 3
     *
     * @return ?int
     */
    public function getPckbn3(): ?int;

    /**
     * Set PC区分 3
     *
     * @param ?int $pckbn3
     * @return $this
     */
    public function setPckbn3(?int $pckbn3): static;

    /**
     * Get PC区分 4
     *
     * @return ?int
     */
    public function getPckbn4(): ?int;

    /**
     * Set PC区分 4
     *
     * @param ?int $pckbn4
     * @return $this
     */
    public function setPckbn4(?int $pckbn4): static;

    /**
     * Get PC区分 5
     *
     * @return ?int
     */
    public function getPckbn5(): ?int;

    /**
     * Set PC区分 5
     *
     * @param ?int $pckbn5
     * @return $this
     */
    public function setPckbn5(?int $pckbn5): static;
}