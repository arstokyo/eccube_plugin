<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CodeTrait
{
    /**
     * 顧客コード
     *
     * @var ?string
     */
    protected ?string $code = null;

    /**
     * {@inheritDoc}
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode(?string $code): static
    {
        $this->code = $code;
        return $this;
    }
}