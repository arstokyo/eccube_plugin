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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelInterface extends Shukka\HasSKbnInterface, Point\HasPointMInterface, GiftAndCampaign\HasCampaignInterface, Denpyo\HasWebOrderNoInterface, Handen\HandenModelBaseInterface, Bikou\HasThreeDenBikouInterface, Handen\HasThreeDfmemohInterface
{
    /**
     * Get CardInfo
     *
     * @return CardInfoModelInterface
     */
    public function getCardInfo(): ?CardInfoModelInterface;

    /**
     * Set CardInfo
     *
     * @param CardInfoModel $cardInfo
     *
     * @return self
     */
    /** @SerializedName("card_info") */
    public function setCardInfo(?CardInfoModelInterface $cardInfo): self;

    /**
     * Get HanpuFirst
     *
     * @return HanpuFirstModelInterface
     */
    public function getHanpuFirst(): ?HanpuFirstModelInterface;

    /**
     * Set HanpuFirst
     *
     * @param HanpuFirstModel $hanpuFirst
     *
     * @return self
     */
    /** @SerializedName("hanpu_first") */
    public function setHanpuFirst(?HanpuFirstModelInterface $hanpuFirst): self;

    /**
     * Get HanpuSecond
     *
     * @return HanpuSecondModelInterface
     */
    public function getHanpuSecond(): ?HanpuSecondModelInterface;

    /**
     * Set HanpuSecond
     *
     * @param HanpuSecondModel $hanpuSecond
     *
     * @return self
     */
    /** @SerializedName("hanpu_second") */
    public function setHanpuSecond(?HanpuSecondModelInterface $hanpuSecond): self;

    /**
     * Get 媒体識別コード
     *
     * @return ?string
     */
    public function getBscode(): ?string;

    /**
     * Set 媒体識別コード
     *
     * @param ?string $bscode
     *
     * @return $this
     */
    public function setBscode(?string $bscode);

    /**
     * Get 頒布コード
     *
     * @return ?string
     */
    public function getHanpucd(): ?string;

    /**
     * Set 頒布コード
     *
     * @param ?string $hanpucd
     *
     * @return $this
     */
    public function setHanpucd(?string $hanpucd);
}
