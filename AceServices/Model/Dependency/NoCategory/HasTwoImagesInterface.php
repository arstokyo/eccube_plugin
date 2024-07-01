<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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
    * @return $this
    */
    public function setImage2(?string $image2);
}