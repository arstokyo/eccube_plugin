<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For Mail
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveMailInterface
{
    /**
     * Get メールアドレス1
     *
     * @return ?string
     */
    public function getMail1(): ?string;

    /**
     * Set メールアドレス1
     *
     * @param ?string $mail1
     * @return $this
     */
    public function setMail1(?string $mail1): static;

    /**
     * Get メールアドレス2
     *
     * @return ?string
     */
    public function getMail2(): ?string;

    /**
     * Set メールアドレス2
     *
     * @param ?string $mail2
     * @return $this
     */
    public function setMail2(?string $mail2): static;

    /**
     * Get メールアドレス3
     *
     * @return ?string
     */
    public function getMail3(): ?string;

    /**
     * Set メールアドレス3
     *
     * @param ?string $mail3
     * @return $this
     */
    public function setMail3(?string $mail3): static;

    /**
     * Get メールアドレス4
     *
     * @return ?string
     */
    public function getMail4(): ?string;

    /**
     * Set メールアドレス4
     *
     * @param ?string $mail4
     * @return $this
     */
    public function setMail4(?string $mail4): static;

    /**
     * Get メールアドレス5
     *
     * @return ?string
     */
    public function getMail5(): ?string;

    /**
     * Set メールアドレス5
     *
     * @param ?string $mail5
     * @return $this
     */
    public function setMail5(?string $mail5): static;
}