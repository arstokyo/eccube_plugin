<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient\AceServices\Model\Request;

interface JmemberModelInterface extends Person\PersonLevel4Interface,
                                        Person\PersonLevel2ExtractInterface, 
                                        NoCategory\HasTaikaiInterface,
                                        NoCategory\HasPassWdInterface,
                                        NoCategory\HasIcodeInterface,
                                        Person\User\HasUserIdInterface,
                                        PhoneAndPC\HasMobileIdInterface,
                                        Point\HasPointInterface,
                                        Point\HasPointKindInterface
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

    /**
     * Get パスワードリマインダー
     *
     * @return Request\Member\Regmember\PassWdRemModelInterface|null リマインダー
     */
    public function getPasswdrem(): ?PassWdRemModelInterface;

    /**
     * Set パスワードリマインダー
     *
     * @param Request\Member\Regmember\PassWdRemModel|null $passwdrem リマインダー
     * @return self
     */
    public function setPasswdrem(?PassWdRemModelInterface $passwdrem): self;
   
}