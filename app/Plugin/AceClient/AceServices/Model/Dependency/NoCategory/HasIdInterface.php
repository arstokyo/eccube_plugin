<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 通販AceSystemID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasIdInterface
{
    /**
    * Get 通販AceSystemID
    *
    * @return ?int
    */
    public function getId(): ?int;

    /**
     * Set 通販AceSystemID
     *
     * @param ?int $id
     * @return $this
     */
    public function setId(?int $id): static;
}