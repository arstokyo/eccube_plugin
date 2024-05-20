<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For Member Mail
 *
 * @author : Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface MemMailModelInterface extends HasMailInterface
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
     * @return $this
     */
    public function setIdx(?int $idx): static;

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
     * @return $this
     */
    public function setDmailkbn(?int $dmailkbn): static;

}