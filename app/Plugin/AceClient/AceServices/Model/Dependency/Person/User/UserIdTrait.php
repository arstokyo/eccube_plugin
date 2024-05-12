<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\User;

trait UserIdTrait
{
    /** @var string $userid ユーザーID */
    protected ?string $userid = null;

    /**
     * {@inheritDoc}
     */
    public function getUserid(): ?string
    {
        return $this->userid;
    }

    /**
     * {@inheritDoc}
     */
    public function setUserid(?string $userid)
    {
        $this->userid = $userid;
        return $this;
    }
}