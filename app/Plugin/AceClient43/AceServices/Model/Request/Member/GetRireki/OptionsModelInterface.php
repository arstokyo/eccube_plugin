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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki;

use Symfony\Component\Serializer\Annotation\SerializedName;

interface OptionsModelInterface
{
    /**
     * 伝票区分: 10 受注
     */
    public const DENKU_ORDER = 10;

    /**
     * Get ReturnJdFreeKubuns
     *
     * @return string
     */
    public function getReturnJdFreeKubuns(): ?string;

    /**
     * Set ReturnJdFreeKubuns
     *
     * @param array $returnJdFreeKubuns
     *
     * @SerializedName("return_jdfree_kubuns")
     *
     * @return self
     */
    public function setReturnJdFreeKubuns(?array $returnJdFreeKubuns): self;

    /**
     * Get Denku
     *
     * @return int
     */
    public function getDenku(): ?int;

    /**
     * Set Denku
     *
     * @param int $denku
     *
     * @return self
     */
    public function setDenku(?int $denku): self;
}
