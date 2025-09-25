<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD.
 *
 * http://www.ec-cube.co.jp/
 */

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\DeliveryTime")
 */
trait DeliveryTimeTrait
{
    /**
     * ACE配送時間帯ID（HTID）
     *
     * 外部システム（ACE）から連携される配送時間帯の識別子を保持します。
     * 例: 指定なし=0, 午前中=1, 14時～16時=3, 16時～18時=4, 18時～20時=5, 19時～21時=6
     *
     * @var int|null
     *
     * @ORM\Column(name="ace_delivery_time_id", type="integer", nullable=true, options={"unsigned":true, "comment":"ACE配送時間帯ID(HTID)"})
     */
    private ?int $ace_delivery_time_id = null;

    /**
     * ACE配送時間帯IDを取得します。
     *
     * @return int|null
     */
    public function getAceDeliveryTimeId(): ?int
    {
        return $this->ace_delivery_time_id;
    }

    /**
     * ACE配送時間帯IDを設定します。
     *
     * @param int|null $aceDeliveryTimeId
     *
     * @return $this
     */
    public function setAceDeliveryTimeId(?int $aceDeliveryTimeId): self
    {
        $this->ace_delivery_time_id = $aceDeliveryTimeId;

        return $this;
    }
}
