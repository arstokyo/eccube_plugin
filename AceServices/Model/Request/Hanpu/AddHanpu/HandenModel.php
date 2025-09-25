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

/**
 * Class HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Shukka\SKbnTrait;
    use Point\PointMTrait;
    use GiftAndCampaign\CampaignTrait;
    use Denpyo\WebOrderNoTrait;
    use Handen\HandenModelBaseTrait;
    use Bikou\ThreeDenBikouTrait;
    use Handen\ThreeDfmemohTrait;

    /** @var ?string 媒体識別コード */
    protected ?string $bscode = null;

    /** @var ?string 頒布コード */
    protected ?string $hanpucd = null;

    /**
     * CardInfo
     *
     * @var CardInfoModelInterface
     */
    protected ?CardInfoModelInterface $cardInfo = null;

    /**
     * HanpuFirst
     *
     * @var HanpuFirstModelInterface
     */
    protected ?HanpuFirstModelInterface $hanpuFirst = null;

    /**
     * HanpuSecond
     *
     * @var HanpuSecondModelInterface
     */
    protected ?HanpuSecondModelInterface $hanpuSecond = null;

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
