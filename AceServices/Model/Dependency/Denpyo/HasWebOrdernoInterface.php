<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasWebOrdernoInterface
{
    /**
     * Get Web上での注文番号
     *
     * @return ?string
     */
    public function getWebOrderno(): ?string;

    /**
     * Set Web上での注文番号
     *
     * @param ?string $webOrderno
     */
    public function setWebOrderno(?string $webOrderno);
}