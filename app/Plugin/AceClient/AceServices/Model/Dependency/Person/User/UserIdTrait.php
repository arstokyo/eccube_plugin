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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\User;

trait UserIdTrait
{
    /** @var string ユーザーID */
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
