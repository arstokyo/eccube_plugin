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

use Plugin\AceClient43\AceServices\Model\Dependency\Calculate\DiscountCalculateTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Model for Order.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderModel implements OrderModelInterface
{
    use HasMessageModelTrait;
    use DiscountCalculateTrait;

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
