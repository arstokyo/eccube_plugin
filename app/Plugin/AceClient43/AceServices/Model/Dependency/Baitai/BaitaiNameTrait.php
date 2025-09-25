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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体名称
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BaitaiNameTrait
{
    /** @var ?string 媒体名称 */
    protected ?string $baitaiName = null;

    /** @var ?string 管理番号名称 */
    protected ?string $baifileName = null;

    /**
     * {@inheritDoc}
     */
    public function getBaitaiName(): ?string
    {
        return $this->baitaiName;
    }

    /**
     * {@inheritDoc}
     *
     *  @\Symfony\Component\Serializer\Annotation\SerializedName("baitai_name")
     */
    public function setBaitaiName(?string $baitaiName)
    {
        $this->baitaiName = $baitaiName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBaifileName(): ?string
    {
        return $this->baifileName;
    }

    /**
     * {@inheritDoc}
     *
     * @\Symfony\Component\Serializer\Annotation\SerializedName("baifile_name")
     */
    public function setBaifileName(?string $baifileName)
    {
        $this->baifileName = $baifileName;

        return $this;
    }
}
