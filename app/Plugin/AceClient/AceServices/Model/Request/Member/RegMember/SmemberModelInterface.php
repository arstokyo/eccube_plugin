<?php

namespace  Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Request;

interface SmemberModelInterface extends Person\PersonLevel4Interface, Person\PersonLevel2ExtractInterface
{
   /**
     * Get メールアドレス
     *
     * @return MemMailModelInterface|null メールアドレス
     */
    public function getMemmail(): ?MemMailModelInterface;

    /**
     * Set メールアドレス
     *
     * @param Request\Member\Regmember\MemMailModel|null $memmail メールアドレス
     * @return self
     */
    public function setMemmail(?MemMailModelInterface $memmail): self;

}