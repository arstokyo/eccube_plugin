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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\Delivery")
 */
trait DeliveryTrait
{
    /**
     * ACE配送業者ID（HSID）
     *
     * 外部システム（ACE）から連携される配送業者の識別子を保持します。
     * 例: ヤマト運輸=10, 佐川急便=20
     *
     * @var int|null
     *
     * @ORM\Column(name="ace_delivery_id", type="integer", nullable=true, options={"unsigned":true, "comment":"ACE配送業者ID(HSID)"})
     */
    private ?int $ace_delivery_id = null;

    /**
     * ACE配送業者IDを取得します。
     *
     * @return int|null
     */
    public function getAceDeliveryId(): ?int
    {
        return $this->ace_delivery_id;
    }

    /**
     * ACE配送業者IDを設定します。
     *
     * @param int|null $aceDeliveryId
     *
     * @return $this
     */
    public function setAceDeliveryId(?int $aceDeliveryId): self
    {
        $this->ace_delivery_id = $aceDeliveryId;

        return $this;
    }
}
