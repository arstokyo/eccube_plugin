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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    /**
     * @var bool|null
     *
     * @SerializedName("direct_bikou")
     */
    private ?bool $directBikou = null;

    /**
     * {@inheritDoc}
     */
    public function getDirectBikou(): ?bool
    {
        return $this->directBikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setDirectBikou(?bool $directBikou): self
    {
        $this->directBikou = $directBikou;

        return $this;
    }
}
