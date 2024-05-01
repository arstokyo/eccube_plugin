<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

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
     */
    public function setMemmail(?MemMailModel $memmail);

}