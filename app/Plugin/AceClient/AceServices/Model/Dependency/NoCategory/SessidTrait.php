<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for セッションID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SessidTrait
{
    /** @var string $sessid セッションID */
    protected ?string $sessid = null;

    /**
     * {@inheritDoc}
     */
    public function getSessid(): ?string
    {
        return $this->sessid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSessid(?string $sessid)
    {
        $this->sessid = $sessid;
        return $this;
    }
}