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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetZaikoAll;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface GetZaikoAllRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetZaikoAllRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, Souko\HasSoukoInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("skid") */
    public function setSouko(?string $souko);

    /**
     * Get 開始行番号
     *
     * @return ?int
     */
    public function getRangefrom(): ?int;

    /**
     * Set 開始行番号
     *
     * @param ?int $rangefrom
     *
     * @return $this
     */
    public function setRangefrom(?int $rangefrom);

    /**
     * Get 終了行番号
     *
     * @return ?int
     */
    public function getRangeto(): ?int;

    /**
     * Set 終了行番号
     *
     * @param ?int $rangeto
     *
     * @return $this
     */
    public function setRangeto(?int $rangeto);
}
