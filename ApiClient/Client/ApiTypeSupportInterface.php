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

namespace Plugin\AceClient43\ApiClient\Client;

/**
 * APIタイプサポートインターフェース
 */
interface ApiTypeSupportInterface
{
    /**
     * 指定されたAPIタイプとフォーマットをサポートするかチェック
     *
     * @param string $apiType
     * @param string $format
     * @param string $httpMethod
     *
     * @return bool
     */
    public function supports(string $apiType, string $format, string $httpMethod): bool;
}
