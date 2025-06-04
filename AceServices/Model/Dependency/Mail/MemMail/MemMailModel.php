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

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailTrait;

class MemMailModel implements MemMailModelInterface
{
    use MailTrait;

    /** @var ?int */
    protected ?int $dmailkbn;

    /** @var ?int */
    protected ?int $idx;

    /**
     * {@inheritDoc}
     */
    public function getDmailkbn(): ?int
    {
        return $this->dmailkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDmailkbn(?int $dmailkbn)
    {
        $this->dmailkbn = $dmailkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIdx(): ?int
    {
        return $this->idx;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdx(?int $idx)
    {
        $this->idx = $idx;

        return $this;
    }
}
