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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    private ?string $returnMemFreeKubuns = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnMemFreeKubuns(): ?string
    {
        return $this->returnMemFreeKubuns;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnMemFreeKubuns(?array $returnMemFreeKubuns): self
    {
        if (is_array($returnMemFreeKubuns)) {
            $this->returnMemFreeKubuns = implode(',', array_unique($returnMemFreeKubuns));
        } else {
            $this->returnMemFreeKubuns = '';
        }

        return $this;
    }
}
