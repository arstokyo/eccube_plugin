<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Class HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Shukka\SKbnTrait,
        Point\PointMTrait,
        GiftAndCampaign\CampaignTrait,
        Denpyo\WebOrderNoTrait,
        Handen\HandenModelBaseTrait,
        Bikou\ThreeDenBikouTrait,
        Handen\ThreeDfmemohTrait;

    /** @var ?string $bscode 媒体識別コード */
    protected ?string $bscode = null;

    /** @var ?string $hanpucd 頒布コード */
    protected ?string $hanpucd = null;

    /** @var ?string $hcnt 頒布回数 */
    protected ?string $hcnt = null;

    /**
     * CardInfo
     *
     * @var Request\Hanpu\AddHanpu\CardInfoModel $cardInfo
     */
    protected ?CardInfoModel $cardInfo  = null;

    /**
     * HanpuFirst
     *
     * @var Request\Hanpu\AddHanpu\HanpuFirstModel $hanpuFirst
     */
    protected ?HanpuFirstModel $hanpuFirst  = null;

    /**
     * HanpuSecond
     *
     * @var Request\Hanpu\AddHanpu\HanpuSecondModel $hanpuSecond
     */
    protected ?HanpuSecondModel $hanpuSecond  = null;

    /**
     * {@inheritDoc}
     */
    function getCardInfo(): ?CardInfoModel
    {
        return $this->cardInfo;
    }

    /**
    * {@inheritDoc}
    */
    function setCardInfo(?CardInfoModel $cardInfo): self
    {
        $this->cardInfo = $cardInfo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function getHanpuFirst(): ?HanpuFirstModel
    {
        return $this->hanpuFirst;
    }

    /**
    * {@inheritDoc}
    */
    function setHanpuFirst(?HanpuFirstModel $hanpuFirst): self
    {
        $this->hanpuFirst = $hanpuFirst;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function getHanpuSecond(): ?HanpuSecondModel
    {
        return $this->hanpuSecond;
    }

    /**
    * {@inheritDoc}
    */
    function setHanpuSecond(?HanpuSecondModel $hanpuSecond): self
    {
        $this->hanpuSecond = $hanpuSecond;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBscode(): ?string
    {
        return $this->bscode;
    }

    /**
     * {@inheritDoc}
     */
    public function setBscode(?string $bscode): static
    {
        $this->bscode = $bscode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanpucd(): ?string
    {
        return $this->hanpucd;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanpucd(?string $hanpucd): static
    {
        $this->hanpucd = $hanpucd;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHcnt(): ?string
    {
        return $this->hcnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setHcnt(?string $hcnt): static
    {
        $this->hcnt = $hcnt;
        return $this;
    }
}
