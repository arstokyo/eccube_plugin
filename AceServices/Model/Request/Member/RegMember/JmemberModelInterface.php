<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Request;

interface JmemberModelInterface extends Person\PersonLevel4Interface, Person\PersonLevel2ExtractInterface, NoCategory\HasTaikaiInterface, NoCategory\HasPassWdInterface, NoCategory\HasIcodeInterface, Person\User\HasUserIdInterface, PhoneAndPC\HasMobileIdInterface, Point\HasPointInterface, Point\HasPointKindInterface
{
    /**
     * Get メールアドレス
     *
     * @return MemMailModelInterface
     */
    public function getMemmail(): MemMailModelInterface;

    /**
     * Set メールアドレス
     *
     * @param MemMailModelInterface $memmail メールアドレス
     *
     * @return self
     */
    public function setMemmail(MemMailModelInterface $memmail): self;

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
     *
     * @return self
     */
    public function setPasswdrem(?PassWdRemModelInterface $passwdrem): self;

    /**
     * Get URL
     *
     * @return string|null URL
     */
    public function getUrl(): ?string;

    /**
     * Set URL
     *
     * @param string|null $url URL
     *
     * @return self
     */
    public function setUrl(?string $url): self;
}
