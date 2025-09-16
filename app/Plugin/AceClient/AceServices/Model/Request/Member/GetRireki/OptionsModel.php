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

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    private ?string $returnJdFreeKubuns = null;

    private ?int $denku = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnJdFreeKubuns(): ?string
    {
        return $this->returnJdFreeKubuns;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnJdFreeKubuns(?array $returnJdFreeKubuns): self
    {
        if (is_array($returnJdFreeKubuns)) {
            $this->returnJdFreeKubuns = implode(',', $returnJdFreeKubuns);
        } else {
            $this->returnJdFreeKubuns = '';
        }

        return $this;
    }

    public function getDenku(): ?int
    {
        return $this->denku;
    }

    public function setDenku(?int $denku): self
    {
        $this->denku = $denku;
        return $this;
    }
}
