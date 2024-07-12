<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Has 請求先コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait IcodeTrait
{

    /** @var ?string $icode 請求先コード */
    protected ?string $icode = null;

    /**
     * {@inheritDoc}
     */
    public function getIcode(): ?string
    {
        return $this->icode;
    }

    /**
     * {@inheritDoc}
     */
    public function setIcode(?string $icode)
    {
        $this->icode = $icode;
        return $this;
    }
}