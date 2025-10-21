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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V2\GetOrderListV2;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;
use Plugin\AceClient43\Entity\DeliveryTimeTrait;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * Model for Jyuden
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyudenModel extends Rireki\RirekiModelLevel1 implements JyudenModelInterface
{
    use DeliveryTimeTrait;
    use Payment\PnameTrait;
    use Good\GtotalTrait;
    use Cost\Souryou\SouryouTrait;
    use Cost\Tesuu\TesuuTrait;
    use Cost\Nebiki\NebikiTrait;
    use Cost\TotalTrait;
    use Day\SdayTrait;
    use Day\UdayTrait;
    use Day\NdayTrait;
    use Denpyo\ZandakaTrait;
    use Haiso\HaisoModelGroup1Trait;
    use Cost\SyoukeiTrait;

    /** @var ?int 行番号 */
    protected ?int $rno = null;

    /** @var ?int 行数 */
    protected ?int $maxrow = null;

    /** @var ?string URL */
    protected ?string $url = null;

    /** @var ?ExtrasFieldsModel ExtrasFields */
    protected ?ExtrasFieldsModel $extrasFields = null;

    /** @var ?int ACE配送業者ID（HSID） */
    protected ?int $hsid = null;

    /** @var ?int 配送伝票区分 */
    protected ?int $odenkbn = null;

    /**
     * {@inheritDoc}
     */
    public function setSday($sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday, 'YmdHis');

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRno(): ?int
    {
        return $this->rno;
    }

    /**
     * {@inheritDoc}
     */
    public function setRno(?int $rno)
    {
        $this->rno = $rno;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxrow(): ?int
    {
        return $this->maxrow;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxrow(?int $maxrow)
    {
        $this->maxrow = $maxrow;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getExtrasFields(): ?ExtrasFieldsModel
    {
        return $this->extrasFields;
    }

    /**
     * {@inheritDoc}
     */
    public function setExtrasFields(?ExtrasFieldsModel $extrasFields): self
    {
        $this->extrasFields = $extrasFields;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHsid(): ?int
    {
        return $this->hsid;
    }

    /**
     * {@inheritDoc}
     */
    public function setHsid(?int $hsid): self
    {
        $this->hsid = $hsid;

        return $this;
    }

    /**
     * Set ACE配送時間帯ID(HTID)
     *
     * @param ?int $aceDeliveryTimeId
     *
     * @return self
     *
     * @SerializedName("Htid")
     */
    public function setAceDeliveryTimeId(?int $aceDeliveryTimeId): self
    {
        $this->ace_delivery_time_id = $aceDeliveryTimeId;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOdenkbn(): ?int
    {
        return $this->odenkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setOdenkbn(?int $odenkbn): self
    {
        $this->odenkbn = $odenkbn;

        return $this;
    }
}
