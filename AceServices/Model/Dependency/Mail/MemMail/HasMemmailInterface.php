<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MemMail;

interface HasMemmailInterface
{
    /**
     * Get メールアドレス
     *
     * @return MemMailModel|null メールアドレス
     */
    public function getMemmail(): ?MemMailModel;

    /**
     * Set メールアドレス
     *
     * @param MemMailModel|null $memmail メールアドレス
     * @return $this
     */
    public function setMemmail(?MemMailModel $memmail): static;
}