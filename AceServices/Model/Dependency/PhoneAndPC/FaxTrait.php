<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for Fax
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FaxTrait
{
    /** @var ?string $fax FAX*/
    protected ?string $fax = null;

      /**
     * {@inheritDoc}
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;
        return $this;
    }

}

