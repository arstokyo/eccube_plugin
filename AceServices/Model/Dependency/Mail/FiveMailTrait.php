<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Trait for 5つメールアドレス
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FiveMailTrait
{
    /** @var ?string $mail1 メールアドレス1 */
    protected ?string $mail1 = null;

    /** @var ?string $mail2 メールアドレス2 */
    protected ?string $mail2 = null;

    /** @var ?string $mail3 メールアドレス3 */
    protected ?string $mail3 = null;

    /** @var ?string $mail4 メールアドレス4 */
    protected ?string $mail4 = null;

    /** @var ?string $mail5 メールアドレス5 */
    protected ?string $mail5 = null;

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail1(): ?string
    {
        return $this->mail1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail1(?string $mail1): parent
    {
        $this->mail1 = $mail1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail2(?string $mail2): parent
    {
        $this->mail2 = $mail2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail3(): ?string
    {
        return $this->mail3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail3(?string $mail3): parent
    {
        $this->mail3 = $mail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail4(): ?string
    {
        return $this->mail4;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail4(?string $mail4): parent
    {
        $this->mail4 = $mail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail5(): ?string
    {
        return $this->mail5;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail5(?string $mail5): parent
    {
        $this->mail5 = $mail5;
        return $this;
    }
}