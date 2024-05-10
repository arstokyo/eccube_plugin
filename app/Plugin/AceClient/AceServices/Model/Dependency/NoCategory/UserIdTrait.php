<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait UserIdTrait
{
    /** @var string $userId ユーザーID */
    protected ?string $userId = null;

    /**
     * {@inheritDoc}
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * {@inheritDoc}
     */
    public function setUserId(?string $userId)
    {
        $this->userId = $userId;
        return $this;
    }
}