<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGcodeInterface
{
    /**
     * Get 商品コード
     *
     * @return ?string 商品コード
     */
    public function getGcode(): ?string;

    /**
     * Set 商品コード
     *
     * @param ?string $gcode 商品コード
     * @return $this
     */
    public function setGcode(?string $gcode);
}