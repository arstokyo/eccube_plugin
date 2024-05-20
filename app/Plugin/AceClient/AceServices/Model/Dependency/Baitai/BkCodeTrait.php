<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体管理コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BkCodeTrait
{
    /** @var ?string $bkcode 媒体管理コード */
    protected ?string $bkcode = null;

    /**
    * Get 媒体管理コード
    *
    * @return ?string
    */
    public function getBkcode(): ?string
    {
        return $this->bkcode;
    }

    /**
    * Set 媒体管理コード
    *
    * @param ?string $bkcode
    * @return $this
    */
    public function setBkcode(?string $bkcode): static
    {
        $this->bkcode = $bkcode;
        return $this;
    }
}