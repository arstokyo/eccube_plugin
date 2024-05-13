<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for セッションID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SessIdTrait
{
    /** @var string $sessId セッションID */
    protected ?string $sessId = null;

    /**
     * {@inheritDoc}
     */
    public function getSessId(): ?string
    {
        return $this->sessId;
    }

    /**
     * {@inheritDoc}
     */
    public function setSessId(?string $sessId)
    {
        $this->sessId = $sessId;
        return $this;
    }
}