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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\CardInfoModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HandenModel as ParentModel;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HanpuFirstModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HanpuSecondModelInterface;

/**
 * Class HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel extends ParentModel
{
    /** @var ?string 頒布回数 */
    protected ?string $hcnt = null;

    /**
     * @param CardInfoModel|null $cardInfo
     */
    public function setCardInfo(?CardInfoModelInterface $cardInfo): self
    {
        return parent::setCardInfo($cardInfo);
    }

    /**
     * @param HanpuFirstModel|null $hanpuFirst
     */
    public function setHanpuFirst(?HanpuFirstModelInterface $hanpuFirst): self
    {
        return parent::setHanpuFirst($hanpuFirst);
    }

    /**
     * @param HanpuSecondModel|null $hanpuSecond
     */
    public function setHanpuSecond(?HanpuSecondModelInterface $hanpuSecond): self
    {
        return parent::setHanpuSecond($hanpuSecond);
    }

    /**
     * Get 頒布回数
     *
     * @return ?string
     */
    public function getHcnt(): ?string
    {
        return $this->hcnt;
    }

    /**
     * Set 頒布回数
     *
     * @param ?string $hcnt
     *
     * @return $this
     */
    public function setHcnt(?string $hcnt)
    {
        $this->hcnt = $hcnt;

        return $this;
    }
}
