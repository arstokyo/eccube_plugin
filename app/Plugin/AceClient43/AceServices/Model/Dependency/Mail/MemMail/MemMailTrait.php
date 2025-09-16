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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MemMail;

/**
 * Trait for Has MemMailModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MemMailTrait
{
    /** @var ?MemMailModel メール */
    protected ?MemMailModel $memmail = null;

    /**
     * {@inheritDoc}
     */
    public function getMemmail(): ?MemMailModel
    {
        return $this->memmail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemmail(?MemMailModel $memmail)
    {
        $this->memmail = $memmail;

        return $this;
    }
}
