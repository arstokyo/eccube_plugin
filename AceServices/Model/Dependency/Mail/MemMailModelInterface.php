<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For Member Mail
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author : Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface MemMailModelInterface
{

    /**
     * Get メールアドレス枝番号
     *
     * @return int|null
     */
    public function getIdx(): ?int;

    /**
     * Set メールアドレス枝番号
     *
     * @param int|null $idx
     * @return self
     */
    public function setIdx(?int $idx): self;

    /**
     * Get DMメール配信区分
     *
     * @return int|null
     */
    public function getDmailkbn(): ?int;

    /**
     * Set DMメール配信区分
     *
     * @param int|null $dmailkbn
     * @return self
     */
    public function setDmailkbn(?int $dmailkbn): self;

    /**
     * Get メールアドレス
     *
     * @return string|null
     */
    public function getMail(): ?string;

    /**
     * Set メールアドレス
     *
     * @param string|null $mail
     * @return self
     */
    public function setMail(?string $mail): self;

}