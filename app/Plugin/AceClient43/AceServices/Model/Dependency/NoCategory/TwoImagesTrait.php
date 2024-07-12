<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for TwoImages
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait TwoImagesTrait
{
    /**
     * 商品画像1
     *
     * @var ?string
     */
    protected ?string $image1 = null;

    /**
     * 商品画像2
     *
     * @var ?string
     */
    protected ?string $image2 = null;

    /**
     * {@inheritDoc}
     */
    public function getImage1() : ?string
    {
        return $this->image1;
    }

    /**
     * {@inheritDoc}
     */
    public function setImage1(?string $image1)
    {
        $this->image1 = $image1;
        return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getImage2() : ?string
    {
        return $this->image2;
    }

    /**
     * {@inheritDoc}
     */
    public function setImage2(?string $image2)
    {
        $this->image2 = $image2;
        return $this;
    }
}