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

namespace Plugin\AceClient43\Util\Serializer;

/**
 * シリアライザサポートインターフェース
 */
interface SerializerSupportInterface
{
    /**
     * 指定されたAPIタイプとフォーマットをサポートするかチェック
     *
     * @param string $apiType
     * @param string $format
     *
     * @return bool
     */
    public function supports(string $apiType, string $format): bool;

    /**
     * シリアライザの優先度を取得
     * 数値が大きいほど高優先度
     *
     * @return int
     */
    public function getPriority(): int;
}
