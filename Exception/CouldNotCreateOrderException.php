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

/**
 * CreateOrder 失敗時の例外
 * CouldNotAddCartException の機能（メッセージ解析ヘルパーなど）を継承します。
 */
class CouldNotCreateOrderException extends CouldNotAddCartException
{
    /**
     * CouldNotCreateOrderException constructor.
     *
     * 第1引数には API レスポンスのメッセージモデル（HasMessageModelInterface 等）を渡すことを想定しています。
     * 例外チェーンからの包み直しの場合は null を渡し、第2引数に前段の例外を渡してください。
     *
     * @param mixed $messageModel HasMessageModelInterface|HasMessageModelExtend1Interface|null
     * @param \Throwable|null $previous
     */
    public function __construct($messageModel = null, ?\Throwable $previous = null, string $defaultMessage = '通販Aceの注文作成に失敗しました。')
    {
        // 既定メッセージを注文作成向けに変更して親コンストラクタへ
        parent::__construct($messageModel, $previous, $defaultMessage);
    }

    public static function new(string $message, $messageModel = null, ?\Throwable $previous = null): CouldNotCreateOrderException
    {
        return new self($messageModel, $previous, $message);
    }
}
