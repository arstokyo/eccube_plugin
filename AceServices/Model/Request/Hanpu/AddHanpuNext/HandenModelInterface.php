<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelInterface extends Shukka\HasSKbnInterface,
                                       Point\HasPointMInterface,
                                       GiftAndCampaign\HasCampaignInterface,
                                       Denpyo\HasWebOrderNoInterface,
                                       Handen\HandenModelBaseInterface,
                                       Bikou\HasThreeDenBikouInterface,
                                       Handen\HasThreeDfmemohInterface
{
    /**
    * Get CardInfo
    *
    * @return Request\Hanpu\AddHanpuNext\CardInfoModel
    */
    public function getCardInfo(): ?CardInfoModel;

    /**
     * Set CardInfo
     *
     * @param Request\Hanpu\AddHanpuNext\CardInfoModel $cardInfo
     * @return self
     */
    #[SerializedName('card_info')]
    public function setCardInfo(?CardInfoModel $cardInfo): self;

    /**
    * Get HanpuFirst
    *
    * @return Request\Hanpu\AddHanpuNext\HanpuFirstModel
    */
    public function getHanpuFirst(): ?HanpuFirstModel;

    /**
     * Set HanpuFirst
     *
     * @param Request\Hanpu\AddHanpuNext\HanpuFirstModel $hanpuFirst
     * @return self
     */
    #[SerializedName('hanpu_first')]
    public function setHanpuFirst(?HanpuFirstModel $hanpuFirst): self;

    /**
    * Get HanpuSecond
    *
    * @return Request\Hanpu\AddHanpuNext\HanpuSecondModel
    */
    public function getHanpuSecond(): ?HanpuSecondModel;

    /**
     * Set HanpuSecond
     *
     * @param Request\Hanpu\AddHanpuNext\HanpuSecondModel $hanpuSecond
     * @return self
     */
    #[SerializedName('hanpu_second')]
    public function setHanpuSecond(?HanpuSecondModel $hanpuSecond): self;

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
     * @return $this
     */
    public function setBscode(?string $bscode): static;

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
     * @return $this
     */
    public function setHanpucd(?string $hanpucd): static;

    /**
    * Get 頒布回数
    *
    * @return ?string
    */
    public function getHcnt(): ?string;

    /**
     * Set 頒布回数
     *
     * @param ?string $hcnt
     * @return $this
     */
    public function setHcnt(?string $hcnt): static;
}