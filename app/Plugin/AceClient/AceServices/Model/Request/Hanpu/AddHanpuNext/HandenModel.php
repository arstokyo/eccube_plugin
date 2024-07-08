<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HandenModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\CardInfoModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HanpuFirstModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HanpuSecondModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

/**
 * Class HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel extends ParentModel
{
    /** @var ?string $hcnt 頒布回数 */
    protected ?string $hcnt = null;

    /**
     * @param Request\Hanpu\AddHanpuNext\CardInfoModel|null $cardInfo
     */
    public function setCardInfo(?CardInfoModelInterface $cardInfo): self
    {
        return parent::setCardInfo($cardInfo);
    }

    /**
     * @param Request\Hanpu\AddHanpuNext\HanpuFirstModel|null $hanpuFirst
     */
    public function setHanpuFirst(?HanpuFirstModelInterface $hanpuFirst): self
    {
        return parent::setHanpuFirst($hanpuFirst);
    }

    /**
     * @param Request\Hanpu\AddHanpuNext\HanpuSecondModel|null $hanpuSecond
     */
    public function setHanpuSecond(?HanpuSecondModelInterface $hanpuSecond): self
    {
        return parent::setHanpuSecond($hanpuSecond);
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
