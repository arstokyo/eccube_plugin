<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

/**
 * Interface for Has 行番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasLineInterface
{
    /**
    * Get 行番号
    *
    * @return ?int
    */
    public function getLine(): ?int;

    /**
     * Set 行番号
     *
     * @param ?int $line
     */
    public function setLine(?int $line);

}