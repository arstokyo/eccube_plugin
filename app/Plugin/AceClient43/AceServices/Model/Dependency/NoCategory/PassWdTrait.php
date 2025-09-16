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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for パスワード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PassWdTrait
{
    /** @var string パスワード */
    protected ?string $passwd = null;

    /**
     * {@inheritDoc}
     */
    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    /**
     * {@inheritDoc}
     */
    public function setPasswd(?string $passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }
}
