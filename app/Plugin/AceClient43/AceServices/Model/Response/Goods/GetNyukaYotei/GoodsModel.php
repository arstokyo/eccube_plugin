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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use Good\GdidTrait;
    use NoCategory\NameTrait;
    use NoCategory\SuuTrait;

    /** @var ?AceDateTime\AceDateTime 入荷予定日 */
    protected ?AceDateTime\AceDateTime $nyday = null;

    /**
     * {@inheritDoc}
     */
    public function getNyday()
    {
        return $this->nyday;
    }

    /**
     * {@inheritDoc}
     */
    public function setNyday($nyday)
    {
        $this->nyday = AceDateTime\AceDateTimeFactory::makeAceDateTime($nyday);

        return $this;
    }
}
