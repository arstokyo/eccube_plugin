<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 携帯固有ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MobileIdTrait
{

    /** @var ?string $mobileid 携帯固有ID */
    protected ?string $mobileid = null;

    /**
    * {@inheritDoc}
    */
    public function getMobileId(): ?string
    {
        return $this->mobileid;
    }

    /**
    * {@inheritDoc}
    */
    public function setMobileId(?string $mobileid)
    {
        $this->mobileid = $mobileid;
        return $this;
    }

}