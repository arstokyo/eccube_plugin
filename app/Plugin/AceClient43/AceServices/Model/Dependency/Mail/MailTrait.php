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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Trait for メール
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MailTrait
{
    /** @var ?string メール */
    protected ?string $mail = null;

    /**
     * {@inheritDoc}
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail(?string $mail)
    {
        $this->mail = $mail;

        return $this;
    }
}
