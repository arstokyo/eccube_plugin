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

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeFactory;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup2;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\SessIdTrait;

/**
 * AddCart 応答用の受注モデル（拡張）
 */
class JyudenModel extends JyudenModelGroup2 implements JyudenModelInterface
{
    use SessIdTrait;

    /** @var AceDateTimeInterface|null */
    protected ?AceDateTimeInterface $planned_shipping_day = null;

    /** @var int|null */
    protected ?int $planned_shipping_count = null;

    /** @var string|null */
    protected ?string $planned_shipping_time = null;

    /**
     * {@inheritdoc}
     */
    public function getPlannedShippingDay(): ?\DateTimeInterface
    {
        return $this->planned_shipping_day ? $this->planned_shipping_day->toDateTime() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function setPlannedShippingDay(?string $day): self
    {
        // AceDateTimeFactory で正規化（Ymd 相当）。null/空は null として扱う
        $this->planned_shipping_day = AceDateTimeFactory::makeAceDateTime($day);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlannedShippingCount(): ?int
    {
        return $this->planned_shipping_count;
    }

    /**
     * {@inheritdoc}
     */
    public function setPlannedShippingCount(?int $count): self
    {
        $this->planned_shipping_count = $count;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlannedShippingTime(): ?string
    {
        return $this->planned_shipping_time;
    }

    /**
     * {@inheritdoc}
     */
    public function setPlannedShippingTime(?string $time): self
    {
        $this->planned_shipping_time = $time;

        return $this;
    }
}
