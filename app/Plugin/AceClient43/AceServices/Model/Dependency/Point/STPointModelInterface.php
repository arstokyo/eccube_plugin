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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Has STPointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface STPointModelInterface extends HasPointInterface
{
    /**
     * Get ポイント算出日付
     *
     * @return string|int|null
     */
    public function getIday(): ?string;

    /**
     * Set ポイント算出日付
     *
     * @param string|int|null $iday
     *
     * @return $this
     */
    public function setIday(?string $iday);

    /**
     * Get 最新購入日
     *
     * @return string|int|null
     */
    /** @SerializedName("inppoint_maxday") */
    public function getInppointMaxday(): ?string;

    /**
     * Set 最新購入日
     *
     * @param string|int|null $inppointMaxday
     *
     * @return $this
     */
    /** @SerializedName("inppoint_maxday") */
    public function setInppointMaxday(?string $inppointMaxday);
}
