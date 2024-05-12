<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Address;

/**
 * Trait for Zip
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ZipTrait
{
    /** @var ?string $zip 郵便番号*/
    protected ?string $zip = null;

    /**
     * {@inheritDoc}
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * {@inheritDoc}
     */
    public function setZip(?string $zip)
    {
        $this->zip = $zip;
        return $this;
    }

}