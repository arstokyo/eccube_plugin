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

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use NoCategory\NameTrait;
    use Bikou\ThreeNotesTrait;

    /** @var ?string 分類区分 */
    protected ?string $kubun = null;

    /** @var ?string 分類ID */
    protected ?string $fcid = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?string
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?string $kubun)
    {
        $this->kubun = $kubun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcid(): ?string
    {
        return $this->fcid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcid(?string $fcid)
    {
        $this->fcid = $fcid;

        return $this;
    }
}
