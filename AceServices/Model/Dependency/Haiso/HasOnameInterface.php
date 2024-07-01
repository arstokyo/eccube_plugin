<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasOnameInterface
{
    /**
     * Get 配送会社名称
     *
     * @return ?string
     */
    public function getOname(): ?string;

    /**
     * Set 配送会社名称
     *
     * @param ?string $oname
     * @return $this
     */
    public function setOname(?string $oname);
}