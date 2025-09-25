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
 * Trait for 5つメールアドレス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveMailTrait
{
    /** @var ?string メールアドレス1 */
    protected ?string $mail1 = null;
    /** @var ?string メールアドレス2 */
    protected ?string $mail2 = null;
    /** @var ?string メールアドレス3 */
    protected ?string $mail3 = null;
    /** @var ?string メールアドレス4 */
    protected ?string $mail4 = null;
    /** @var ?string メールアドレス5 */
    protected ?string $mail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getMail1(): ?string
    {
        return $this->mail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail1(?string $mail1)
    {
        $this->mail1 = $mail1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail2(?string $mail2)
    {
        $this->mail2 = $mail2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMail3(): ?string
    {
        return $this->mail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail3(?string $mail3)
    {
        $this->mail3 = $mail3;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMail4(): ?string
    {
        return $this->mail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail4(?string $mail4)
    {
        $this->mail4 = $mail4;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMail5(): ?string
    {
        return $this->mail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail5(?string $mail5)
    {
        $this->mail5 = $mail5;

        return $this;
    }
}
