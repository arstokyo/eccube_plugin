<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface for Has 明細備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMBikouInterface
{

    /**
     * Get 明細備考
     *
     * @return string|null
     */
    public function getMbikou(): ?string;

    /**
     * Set 明細備考
     *
     * @param string|null $mbikou
     * @return $this
     */
    public function setMbikou(?string $mbikou): static;

}