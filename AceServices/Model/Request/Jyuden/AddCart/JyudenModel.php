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
    private ?CardInfoModel $cardinfo = null;

    /** @var CvsInfoModel|null */
    private ?CvsInfoModel $cvsinfo = null;

    /** @var DpsInfoModel|null */
    private ?DpsInfoModel $dpsinfo = null;

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
}
