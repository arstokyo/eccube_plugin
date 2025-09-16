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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for HasTwoImages
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasTwoImagesInterface
{
    /**
     * Get 商品画像1
     *
     * @return string|null
     */
    public function getImage1(): ?string;

    /**
     * Set 商品画像1
     *
     * @param string|null $image1
     *
     * @return $this
     */
    public function setImage1(?string $image1);

    /**
     * Get 商品画像2
     *
     * @return string|null
     */
    public function getImage2(): ?string;

    /**
     * Set 商品画像2
     *
     * @param string|null $image2
     *
     * @return $this
     */
    public function setImage2(?string $image2);
}
