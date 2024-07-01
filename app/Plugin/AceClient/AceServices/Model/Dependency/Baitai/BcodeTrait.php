<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BcodeTrait
{
    /** @var ?string $bcode 媒体コード */
    protected ?string $bcode = null;

    /**
    * Get 媒体コード
    *
    * @return ?string
    */
    public function getBcode(): ?string
    {
        return $this->bcode;
    }

    /**
    * Set 媒体コード
    *
    * @param ?string $bcode
    * @return $this
    */
    public function setBcode(?string $bcode)
    {
        $this->bcode = $bcode;
        return $this;
    }

}