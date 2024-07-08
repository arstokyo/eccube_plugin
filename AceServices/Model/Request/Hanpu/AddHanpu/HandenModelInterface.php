<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\Request;

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
    * @return Request\Hanpu\AddHanpu\CardInfoModelInterface
    */
    public function getCardInfo(): ?CardInfoModelInterface;

    /**
     * Set CardInfo
     *
     * @param Request\Hanpu\AddHanpu\CardInfoModel $cardInfo
     * @return self
     */
    #[SerializedName('card_info')]
    public function setCardInfo(?CardInfoModelInterface $cardInfo): self;

    /**
    * Get HanpuFirst
    *
    * @return Request\Hanpu\AddHanpu\HanpuFirstModelInterface
    */
    public function getHanpuFirst(): ?HanpuFirstModelInterface;

    /**
     * Set HanpuFirst
     *
     * @param Request\Hanpu\AddHanpu\HanpuFirstModel $hanpuFirst
     * @return self
     */
    #[SerializedName('hanpu_first')]
    public function setHanpuFirst(?HanpuFirstModelInterface $hanpuFirst): self;

    /**
    * Get HanpuSecond
    *
    * @return Request\Hanpu\AddHanpu\HanpuSecondModelInterface
    */
    public function getHanpuSecond(): ?HanpuSecondModelInterface;

    /**
     * Set HanpuSecond
     *
     * @param Request\Hanpu\AddHanpu\HanpuSecondModel $hanpuSecond
     * @return self
     */
    #[SerializedName('hanpu_second')]
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

}