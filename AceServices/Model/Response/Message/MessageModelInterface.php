<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

/**
 * Interface for Message Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MessageModelInterface
{
    /**
     * Get エラーメッセージ1
     */
    public function getMessage1(): ?string;

    /**
     * Set エラーメッセージ1
     *
     * @param ?string $message1
     * @return void
     */
    public function setMessage1(?string $message1);


    /**
     * Get エラーメッセージ2
     */
    public function getMessage2(): ?string;

    /**
     * Set エラーメッセージ2
     *
     * @param ?string $message2
     * @return void
     */
    public function setMessage2(?string $message2);

}