<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

/**
 * Interface for Has 結果
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasResultInterface
{
    /**
     * Get 結果
     */
    public function getResult(): ?string;

    /**
     * Set 結果
     *
     * @param ?string $result
     * @return $this
     */
    public function setResult(?string $result);
}