<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasNameInterface
{
    /**
     * Get 名称
     *
     * @return ?string
     */
    public function getName(): ?string;

    /**
     * Set 名称
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name);
}