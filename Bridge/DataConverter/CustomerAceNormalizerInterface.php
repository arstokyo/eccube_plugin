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

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;

interface CustomerAceNormalizerInterface
{
    /**
     * EC -> ACE: 氏名をACE送信用の形式へ整形
     */
    public function formatAceFullNameFromEcName(?string $name01, ?string $name02): string;

    /**
     * ACE -> EC: フルネーム(またはフルカナ)を解析して顧客へ設定
     * $type = 'name' | 'kana'
     */
    public function parseAceFullNameToEc(?string $fullName, Customer $customer, string $type): void;

    /**
     * ACE -> EC: フルネーム(またはフルカナ)を解析して配列に格納
     * $type = 'name' | 'kana'
     */
    public function parseAceFullNameToParts(?string $fullName, string $type): array;

    /**
     * EC -> ACE: 英数字/スペースを全角へ（ASN）し、ハイフン類を全角に寄せる
     */
    public function toZenkakuAddress(string $value): string;

    /**
     * ACE -> EC: 全角英数字/スペース/主要記号を半角へ、ダッシュ類を半角ハイフンに統一
     */
    public function toHankakuFromAce(string $value): string;
}
