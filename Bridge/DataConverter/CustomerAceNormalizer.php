<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;

class CustomerAceNormalizer
{
    /**
     * EC -> ACE: 氏名をACE送信用の形式へ整形（姓　名の結合 + KVA）
     */
    public function formatAceFullNameFromEcName(?string $name01, ?string $name02): string
    {
        return mb_convert_kana(sprintf('%s　%s', $name01 ?? '', $name02 ?? ''), 'KVA');
    }

    /**
     * ACE -> EC: フルネーム(またはフルカナ)を解析して顧客へ設定（従来仕様に準拠）
     * - name: スペースを全角へ正規化し、姓/名に分割して Name01/Name02 に設定
     * - kana: 英字を半角へ('a')、スペースを全角へ正規化し、姓/名に分割して Kana01/Kana02 に設定
     */
    public function parseAceFullNameToEc(?string $fullName, Customer $customer, string $type): void
    {
        if (!$fullName) {
            if ($type === 'name') {
                $customer->setName01('');
                $customer->setName02('');
            } else {
                $customer->setKana01('');
                $customer->setKana02('');
            }

            return;
        }

        $value = $fullName;
        if ($type !== 'name') {
            $value = mb_convert_kana($value, 'a', 'utf-8');
        }

        // 半角スペースを全角スペースへ寄せて分割
        $value = str_replace(' ', '　', $value);
        $parts = explode('　', $value);
        $first = isset($parts[0]) ? trim($parts[0]) : '';
        $last = isset($parts[1]) ? trim($parts[1]) : '';

        if ($type === 'name') {
            $customer->setName01($first);
            $customer->setName02($last);
        } else {
            $customer->setKana01($first);
            $customer->setKana02($last);
        }
    }

    /**
     * EC -> ACE: 英数字/スペースを全角へ（ASN）し、ハイフン類を全角に寄せる
     */
    public function toZenkakuAddress(string $value): string
    {
        $v = mb_convert_kana($value, 'ASN', 'utf-8');

        return strtr($v, [
            '-' => '－',
            '–' => '－',
            '—' => '－',
            '―' => '－',
        ]);
    }

    /**
     * ACE -> EC: 全角英数字/スペース/主要記号を半角へ、ダッシュ類を半角ハイフンに統一
     */
    public function toHankakuFromAce(string $value): string
    {
        $v = strtr($value, [
            '－' => '-',
            '―' => '-',
            '—' => '-',
            '–' => '-',
        ]);
        $v = strtr($v, [
            '：' => ':',
            '．' => '.',
            '，' => ',',
            '（' => '(',
            '）' => ')',
            '［' => '[',
            '］' => ']',
            '｛' => '{',
            '｝' => '}',
            '／' => '/',
            '＊' => '*',
            '＋' => '+',
            '＆' => '&',
            '％' => '%',
            '！' => '!',
            '？' => '?',
            '＠' => '@',
            '＝' => '=',
            '￥' => '¥',
        ]);
        $v = mb_convert_kana($v, 'asn', 'utf-8');

        return trim($v);
    }
}
