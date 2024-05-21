<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Model for PasswdReminder
 *
 * @author kmorino
 */
trait PassWdRemModelTrait
{
    /** @var ?PassWdRemModel $passwdrem */
    protected ?PassWdRemModel $passwdrem = null;

    /**
     * {@inheritDoc}
     */
    public function getPasswdRem(): ?PassWdRemModel
    {
        return $this->passwdrem;
    }

    /**
     * {@inheritDoc}
     */
    public function setPasswdRem(?PassWdRemModel $passwdrem): static
    {
        $this->passwdrem = $passwdrem;
        return $this;
    }
}