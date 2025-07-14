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
    private ?string $returnMemFreeKubun = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnMemFreeKubun(): ?string
    {
        return $this->returnMemFreeKubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnMemFreeKubun(?array $returnMemFreeKubun): self
    {
        if (is_array($returnMemFreeKubun)) {
            $this->returnMemFreeKubun = implode(',', $returnMemFreeKubun);
        } else {
            $this->returnMemFreeKubun = '';
        }

        return $this;
    }
}
