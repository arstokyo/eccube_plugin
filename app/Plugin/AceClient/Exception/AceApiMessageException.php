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

namespace Plugin\AceClient43\Exception;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * 通販Ace APIのメッセージエラーを扱う基底例外クラス
 */
abstract class AceApiMessageException extends AceClientBaseException
{
    protected ?string $message1 = null;

    protected ?string $message2 = null;

    /**
     * AceApiMessageException constructor.
     *
     * @param string $defaultMessage デフォルトメッセージ
     * @param HasMessageModelInterface|HasMessageModelExtend1Interface|null $messageModel APIレスポンスのメッセージモデル
     * @param \Throwable|null $previous 前の例外
     */
    public function __construct(
        string $defaultMessage,
        $messageModel = null,
        ?\Throwable $previous = null,
    ) {
        // メッセージモデルからメッセージを取得
        if ($messageModel !== null) {
            $this->extractMessages($messageModel);
        }

        // 実際のエラーメッセージを決定（ユーザー向けメッセージを使用）
        $actualMessage = $this->buildErrorMessage($defaultMessage);

        parent::__construct($actualMessage, $previous);
    }

    /**
     * メッセージモデルからメッセージを抽出
     *
     * @param mixed $messageModel HasMessageModelInterface|HasMessageModelExtend1Interface|string|array|null
     */
    private function extractMessages($messageModel): void
    {
        if ($messageModel === null) {
            return;
        }

        // 文字列が渡された場合はそのままユーザー向けメッセージとして扱う
        if (is_string($messageModel)) {
            $text = trim($messageModel);
            if ($text !== '') {
                $this->message1 = $text;
            }

            return;
        }

        // 配列の場合は message1/message2 キーを優先して取り出す
        if (is_array($messageModel)) {
            $m1 = $messageModel['message1'] ?? $messageModel['Message1'] ?? null;
            $m2 = $messageModel['message2'] ?? $messageModel['Message2'] ?? null;
            if (is_string($m1) && $m1 !== '') {
                $this->message1 = $m1;
            }
            if (is_string($m2) && $m2 !== '') {
                $this->message2 = $m2;
            }

            return;
        }

        // オブジェクトの場合の取り扱い
        if (is_object($messageModel)) {
            // 直接 getMessage1()/getMessage2() を持つ場合
            if (method_exists($messageModel, 'getMessage1') || method_exists($messageModel, 'getMessage2')) {
                $m1 = method_exists($messageModel, 'getMessage1') ? $messageModel->getMessage1() : null;
                $m2 = method_exists($messageModel, 'getMessage2') ? $messageModel->getMessage2() : null;
                if (is_string($m1) && $m1 !== '') {
                    $this->message1 = $m1;
                }
                if (is_string($m2) && $m2 !== '') {
                    $this->message2 = $m2;
                }

                return;
            }

            // ラッパーが getMessage() を返す場合（従来のインターフェイス）
            if (method_exists($messageModel, 'getMessage')) {
                $message = $messageModel->getMessage();
                if ($message === null) {
                    return;
                }

                // ネストされたメッセージが文字列
                if (is_string($message)) {
                    $text = trim($message);
                    if ($text !== '') {
                        $this->message1 = $text;
                    }

                    return;
                }

                // ネストされたメッセージが配列
                if (is_array($message)) {
                    $m1 = $message['message1'] ?? $message['Message1'] ?? null;
                    $m2 = $message['message2'] ?? $message['Message2'] ?? null;
                    if (is_string($m1) && $m1 !== '') {
                        $this->message1 = $m1;
                    }
                    if (is_string($m2) && $m2 !== '') {
                        $this->message2 = $m2;
                    }

                    return;
                }

                // ネストされたメッセージがオブジェクト（getMessage1/getMessage2 を期待）
                if (is_object($message)) {
                    if (method_exists($message, 'getMessage1')) {
                        $m1 = $message->getMessage1();
                        if (is_string($m1) && $m1 !== '') {
                            $this->message1 = $m1;
                        }
                    }
                    if (method_exists($message, 'getMessage2')) {
                        $m2 = $message->getMessage2();
                        if (is_string($m2) && $m2 !== '') {
                            $this->message2 = $m2;
                        }
                    }
                }

                return;
            }
        }

        // ここまでで取得できない場合は何もしない（デフォルトメッセージを使用）
    }

    /**
     * エラーメッセージを構築（ユーザー向けのみ）
     *
     * @param string $defaultMessage
     *
     * @return string
     */
    private function buildErrorMessage(string $defaultMessage): string
    {
        // ユーザー向けメッセージ（message1）がある場合はそれを使用
        if (!empty($this->message1)) {
            return $this->message1;
        }

        // message1がない場合はデフォルトメッセージを使用
        return $defaultMessage;
    }

    /**
     * メッセージ1を取得
     *
     * @return string|null
     */
    public function getMessage1(): ?string
    {
        return $this->message1;
    }

    /**
     * メッセージ2を取得（デバッグ用）
     *
     * @return string|null
     */
    public function getMessage2(): ?string
    {
        return $this->message2;
    }

    /**
     * ユーザー向けメッセージがあるかチェック
     *
     * @return bool
     */
    public function hasMessage(): bool
    {
        return !empty($this->message1);
    }

    /**
     * クリティカルエラーかどうかを判定
     * メッセージ2が存在する場合はクリティカルエラーとみなす（デバッグ用）
     *
     * @return bool
     */
    public function isCriticalError(): bool
    {
        return !empty($this->message2);
    }

    /**
     * ユーザー向けの表示メッセージを取得
     * message1のみを使用し、message2は含めない
     *
     * @return string
     */
    public function getUserMessage(): string
    {
        // message1があればそれを使用、なければ例外メッセージを使用
        return $this->message1 ?: $this->getMessage();
    }

    /**
     * デバッグ用の詳細メッセージを取得
     * message1とmessage2の両方を含む
     *
     * @return string
     */
    public function getDebugMessage(): string
    {
        $messages = [];

        if ($this->message1) {
            $messages[] = 'User Message: '.$this->message1;
        }

        if ($this->message2) {
            $messages[] = 'Debug Message: '.$this->message2;
        }

        if (empty($messages)) {
            return $this->getMessage();
        }

        return implode(' | ', $messages);
    }
}
