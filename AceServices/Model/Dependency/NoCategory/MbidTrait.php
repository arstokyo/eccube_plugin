<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait MbidTrait
{
    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /**
    * {@inheritDoc}
    */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
    * {@inheritDoc}
    */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }
}