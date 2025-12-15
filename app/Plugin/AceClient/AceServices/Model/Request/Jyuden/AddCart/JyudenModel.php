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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup1;

/**
 * Jyuden Model for AddCart
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModel extends JyudenModelGroup1 implements JyudenModelInterface
{
    /** @var CardInfoModel|null */
    protected ?CardInfoModel $cardinfo = null;

    /** @var CvsInfoModel|null */
    protected ?CvsInfoModel $cvsinfo = null;

    /** @var DpsInfoModel|null */
    protected ?DpsInfoModel $dpsinfo = null;

    protected ?string $skkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getCardInfo(): ?CardInfoModel
    {
        return $this->cardinfo;
    }

    /**
     * {@inheritDoc}
     */
    public function setCardInfo(?CardInfoModel $cardInfo): self
    {
        $this->cardinfo = $cardInfo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCvsInfo(): ?CvsInfoModel
    {
        return $this->cvsinfo;
    }

    /**
     * {@inheritDoc}
     */
    public function setCvsInfo(?CvsInfoModel $cvsinfo): self
    {
        $this->cvsinfo = $cvsinfo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDpsInfo(): ?DpsInfoModelInterface
    {
        return $this->dpsinfo;
    }

    /**
     * {@inheritDoc}
     */
    public function setDpsInfo(?DpsInfoModelInterface $dpsinfo): self
    {
        $this->dpsinfo = $dpsinfo;

        return $this;
    }

    /**
     * 請求書発送区分を指定
     *
     * 0:請求書同梱 1:請求書別送
     *
     * @param int $skkbn
     *
     * @return self
     */
    public function setSkkbn(?string $skkbn): self
    {
        $this->skkbn = $skkbn;

        return $this;
    }

    /**
     * 請求書発送区分を取得
     *
     * 0:請求書同梱 1:請求書別送
     *
     * @return string
     */
    public function getSkkbn(): ?string
    {
        return $this->skkbn;
    }
}
