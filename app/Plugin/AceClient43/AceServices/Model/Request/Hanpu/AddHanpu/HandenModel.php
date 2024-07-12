<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

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

    /**
     * CardInfo
     *
     * @var Request\Hanpu\AddHanpu\CardInfoModelInterface $cardInfo
     */
    protected ?CardInfoModelInterface $cardInfo  = null;

    /**
     * HanpuFirst
     *
     * @var Request\Hanpu\AddHanpu\HanpuFirstModelInterface $hanpuFirst
     */
    protected ?HanpuFirstModelInterface $hanpuFirst  = null;

    /**
     * HanpuSecond
     *
     * @var Request\Hanpu\AddHanpu\HanpuSecondModelInterface $hanpuSecond
     */
    protected ?HanpuSecondModelInterface $hanpuSecond  = null;

    /**
     * {@inheritDoc}
     */
    public function getCardInfo(): ?CardInfoModelInterface
    {
        return $this->cardInfo;
    }

    /**
    * {@inheritDoc}
    */
    public function setCardInfo(?CardInfoModelInterface $cardInfo): self
    {
        $this->cardInfo = $cardInfo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanpuFirst(): ?HanpuFirstModelInterface
    {
        return $this->hanpuFirst;
    }

    /**
    * {@inheritDoc}
    */
    public function setHanpuFirst(?HanpuFirstModelInterface $hanpuFirst): self
    {
        $this->hanpuFirst = $hanpuFirst;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanpuSecond(): ?HanpuSecondModelInterface
    {
        return $this->hanpuSecond;
    }

    /**
    * {@inheritDoc}
    */
    public function setHanpuSecond(?HanpuSecondModelInterface $hanpuSecond): self
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
    public function setBscode(?string $bscode)
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
    public function setHanpucd(?string $hanpucd)
    {
        $this->hanpucd = $hanpucd;
        return $this;
    }

}
