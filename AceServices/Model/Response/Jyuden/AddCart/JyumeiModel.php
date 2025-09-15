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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;
use Plugin\AceClient43\Entity\Constants\AceProductType;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Model for Jyumei
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModel extends Jyumei\JyumeiModelGroup2 implements JyumeiModelInterface
{
    use Jyumei\JyumeiModelGroup3Trait;
    use Zaiko\ZaikoTrait;
    use Zaiko\IgnoreZaikoTrait;

    /** @var string 受注サポートより振られた商品 */
    public const ITEM_TYPE_SUPPORT = 'product_support';

    /** @var string 受注サポートより振られた商品ではない */
    public const ITEM_TYPE_NORMAL = 'normal';

    protected $supportSpid = [];

    protected $supportProvider = [];

    protected $supportSpidQty = [];

    protected $supportSummary = [];

    protected $itemType = '';

    /**
     * {@inheritdoc}
     */
    public function setSupportSpid(string $supportSpid): void
    {
        $this->supportSpid = $supportSpid === '' ? [] : explode(',', $supportSpid);
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportSpid(): array
    {
        return $this->supportSpid;
    }

    /**
     * {@inheritdoc}
     */
    public function setSupportProvider(string $supportProvider): void
    {
        $this->supportProvider = $supportProvider === '' ? [] : explode(',', $supportProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportProvider(): array
    {
        return $this->supportProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function setSupportSpidQty(string $supportSpidQty): void
    {
        $result = [];

        if ($supportSpidQty !== '') {
            foreach (explode(',', $supportSpidQty) as $item) {
                $parts = explode(':', $item, 2);
                $spid = isset($parts[0]) ? $parts[0] : null;
                $qty = isset($parts[1]) ? $parts[1] : null;
                if ($spid !== null && $qty !== null) {
                    $result[$spid] = (int) $qty;
                }
            }
        }

        $this->supportSpidQty = $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportSpidQty(): array
    {
        return $this->supportSpidQty;
    }

    /**
     * {@inheritdoc}
     */
    public function setSupportSummary(string $supportSummary): void
    {
        $result = [];

        if ($supportSummary !== '') {
            foreach (explode(',', $supportSummary) as $item) {
                $parts = explode(':', $item);
                if (count($parts) === 3) {
                    $spid = $parts[0];
                    $providers = $parts[1];
                    $qty = $parts[2];
                    $providerArr = [];
                    if ($providers !== null && $providers !== '') {
                        $providerArr = array_filter(explode(',', $providers), function ($v) {
                            return $v !== '' && $v !== null && $v !== 'null';
                        });
                    }
                    $result[] = [
                        'spid' => $spid,
                        'providers' => $providerArr,
                        'qty' => (int) $qty,
                    ];
                }
            }
        }

        $this->supportSummary = $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportSummary(): array
    {
        return $this->supportSummary;
    }

    /**
     * {@inheritdoc}
     */
    public function setItemType(string $itemType): void
    {
        $this->itemType = $itemType;
    }

    /**
     * {@inheritdoc}
     */
    public function getItemType(): string
    {
        return $this->itemType;
    }

    /**
     * {@inheritdoc}
     */
    public function isPresent(): bool
    {
        return $this->getItemType() === self::ITEM_TYPE_SUPPORT && $this->getGkbn() === AceProductType::PRODUCT;
    }

    /**
     * {@inheritdoc}
     */
    public function isProduct(): bool
    {
        return $this->getGkbn() === AceProductType::PRODUCT;
    }

    /**
     * {@inheritdoc}
     */
    public function isDeliveryFee(): bool
    {
        return $this->getGkbn() === AceProductType::DELIVERY_FEE;
    }

    /**
     * {@inheritdoc}
     */
    public function isCharge(): bool
    {
        return $this->getGkbn() === AceProductType::CHARGE_FEE;
    }

    /**
     * {@inheritdoc}
     */
    public function isDiscount(): bool
    {
        return $this->getGkbn() === AceProductType::DISCOUNT;
    }

    /**
     * 合計金額が0円の場合は0を返す・その以外は税抜単価を返す
     */
    public function getPreferTouttanka(): ?float
    {
        return $this->getToutmoney() === 0 ? 0 : $this->getTouttanka();
    }

    /**
     * 合計金額が0円の場合は0を返す・その以外は税込単価を返す
     */
    public function getPreferTintanka(): ?float
    {
        return $this->getTintanka() === 0 ? 0 : $this->getTintanka();
    }

    /**
     * 正規化済みの税抜単価を文字列で返す（scale=2）.
     */
    public function getPreferTouttankaAsString(): ?string
    {
        return NumberConverter::normalizeFloatToString($this->getPreferTouttanka(), 2);
    }

    /**
     * 正規化済みの税込単価を文字列で返す（scale=2）.
     */
    public function getPreferTintankaAsString(): ?string
    {
        return NumberConverter::normalizeFloatToString($this->getPreferTintanka(), 2);
    }

    /**
     * {@inheritdoc}
     */
    public function getSuuAsString(): ?string
    {
        return (string) max(0, $this->getSuu());
    }
}
