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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Model for Order.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderModel implements OrderModelInterface
{
    use HasMessageModelTrait;

    /** @var JyusubModel|null */
    protected ?JyusubModel $jyusub = null;

    /** @var JyudenModel|null */
    protected ?JyudenModel $jyuden = null;

    /** @var JyumeiModel[]|null 受注明細（行） */
    protected ?array $jyumei = null;

    /** @var SupportModel[]|null 受注サポート行（ACE拡張） */
    protected ?array $support = null;

    /** @var PointModel|null */
    protected ?PointModel $point = null;

    /** @var MailJyudenModel|null */
    protected ?MailJyudenModel $mailjyuden = null;

    protected ?int $pointDicount = null;

    protected ?int $promotionDiscount = null;

    protected ?int $promotionDiscountExcludedTax = null;

    protected ?int $pointDicountExcludedTax = null;

    /**
     * {@inheritDoc}
     */
    public function getJyusub(): ?JyusubModel
    {
        return $this->jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyusub(?JyusubModel $jyusub): void
    {
        $this->jyusub = $jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModel
    {
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(?JyudenModel $jyuden): void
    {
        $this->jyuden = $jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyumei(): ?array
    {
        return $this->jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyumei(?array $jyumei): void
    {
        $this->jyumei = $jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function getPoint(): ?PointModel
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     */
    public function setPoint(?PointModel $point): void
    {
        $this->point = $point;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailJyuden(): ?MailJyudenModel
    {
        return $this->mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailJyuden(?MailJyudenModel $mailjyuden): void
    {
        $this->mailjyuden = $mailjyuden;
    }

    /**
     * 受注サポート行（support）を取得
     *
     * @return SupportModel[]|null
     */
    public function getSupport(): ?array
    {
        return $this->support;
    }

    /**
     * 受注サポート行（support）を設定
     *
     * @param SupportModel[]|null $support
     *
     * @return void
     */
    public function setSupport(?array $support): void
    {
        $this->support = $support;
    }

    public function getEarnablePoints(): ?float
    {
        $points = 0.0;

        $supports = $this->getSupport() ?? [];
        foreach ($supports as $support) {
            $points += (float) $support->getEarnablePoints();
        }

        return max($points, 0.0);
    }

    public function getPromotionDiscount(): ?int
    {
        if (null !== $this->promotionDiscount) {
            return $this->promotionDiscount;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $promotionDiscountGcode = $this->getPromotionDiscountGcode();
        if (null !== $promotionDiscountGcode) {
            $jyumeiList = $this->getJyumei() ?? [];

            $discount = 0.0;
            foreach ($jyumeiList as $jyumei) {
                // 値引きで、かつ、対象の商品コードと一致する場合
                if ($jyumei->isDiscount() && $promotionDiscountGcode === $jyumei->getGcode()) {
                    // 税込の価格を採用。
                    // 変更したい場合はカスタマイズのOrderModelを継承してください。
                    $discount += (float) $jyumei->getTinmoney();
                }
            }
            $this->promotionDiscount = (int) min($discount, 0.0);
        } else {
            $pointDiscount = (float) $this->getPointDiscount();
            $allDiscount = (float) $this->getJyuden()->getNebiki();
            $this->promotionDiscount = (int) min($allDiscount - $pointDiscount, 0.0);
        }

        return (int) $this->promotionDiscount;
    }

    public function getPromotionDiscountExcludedTax(): ?int
    {
        if (null !== $this->promotionDiscountExcludedTax) {
            return $this->promotionDiscountExcludedTax;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $promotionDiscountGcode = $this->getPromotionDiscountGcode();
        if (null !== $promotionDiscountGcode) {
            $jyumeiList = $this->getJyumei() ?? [];

            $discount = 0.0;
            foreach ($jyumeiList as $jyumei) {
                // 値引きで、かつ、対象の商品コードと一致する場合
                if ($jyumei->isDiscount() && $promotionDiscountGcode === $jyumei->getGcode()) {
                    // 税抜の価格を採用。
                    // 変更したい場合はカスタマイズのOrderModelを継承してください。
                    $discount += (float) $jyumei->getToutmoney();
                }
            }
            $this->promotionDiscountExcludedTax = (int) min($discount, 0.0);
        } else {
            $pointDiscount = (float) $this->getPointDiscountExcludedTax();
            $allDiscount = (float) $this->getJyuden()->getNebikizn();
            $this->promotionDiscountExcludedTax = (int) min($allDiscount - $pointDiscount, 0.0);
        }

        return (int) $this->promotionDiscountExcludedTax;
    }

    protected function getPromotionDiscountGcode(): ?string
    {
        return null;
    }

    public function getPointDiscount(): ?int
    {
        if (null !== $this->pointDicount) {
            return $this->pointDicount;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $pointDiscountGcode = $this->getPointDiscountGcode();
        $jyumeiList = $this->getJyumei() ?? [];
        if (null === $pointDiscountGcode || empty($jyumeiList)) {
            return null;
        }

        $discount = 0.0;
        foreach ($jyumeiList as $jyumei) {
            // 値引きで、かつ、対象の商品コードと一致する場合
            if ($jyumei->isDiscount() && $jyumei->getGcode() === $pointDiscountGcode) {
                // 税込の合計価格を採用。
                // 変更したい場合はカスタマイズのOrderModelを継承してください。
                $discount += (float) $jyumei->getTinmoney();
            }
        }

        $this->pointDicount = (int) min($discount, 0.0);

        return $this->pointDicount;
    }

    public function getPointDiscountExcludedTax(): ?int
    {
        if (null !== $this->pointDicountExcludedTax) {
            return $this->pointDicountExcludedTax;
        }

        if (null === $this->getJyuden()) {
            return null;
        }

        $pointDiscountGcode = $this->getPointDiscountGcode();
        $jyumeiList = $this->getJyumei() ?? [];
        if (null === $pointDiscountGcode || empty($jyumeiList)) {
            return null;
        }

        $discount = 0.0;
        foreach ($jyumeiList as $jyumei) {
            // 値引きで、かつ、対象の商品コードと一致する場合
            if ($jyumei->isDiscount() && $jyumei->getGcode() === $pointDiscountGcode) {
                // 税抜の合計価格を採用。
                // 変更したい場合はカスタマイズのOrderModelを継承してください。
                $discount += (float) $jyumei->getToutmoney();
            }
        }

        $this->pointDicountExcludedTax = (int) min($discount, 0.0);

        return $this->pointDicountExcludedTax;
    }

    protected function getPointDiscountGcode(): ?string
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'jyumei' => JyumeiModel::class,
            'support' => SupportModel::class,
        ];
    }
}
