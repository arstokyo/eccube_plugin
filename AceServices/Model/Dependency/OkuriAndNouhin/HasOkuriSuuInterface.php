<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has 荷物個数
 *
 * @author Ars-Phuoc <v.t.nguyen@ar-system.co.jp>
 */
interface HasOkuriSuuInterface
{
    /**
     * Get 荷物個数
     *
     * @return ?int
     */
    public function getOkurisuu(): ?int;

    /**
     * Set 荷物個数
     *
     * @param ?int $okurisuu
     * @return $this
     */
    public function setOkurisuu(?int $okurisuu): static;
}