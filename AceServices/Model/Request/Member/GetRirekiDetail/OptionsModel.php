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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    private ?string $returnJdFreeKubuns = null;

    private ?bool $returnManualTax = null;

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

    /**
     * {@inheritDoc}
     */
    public function getReturnManualTax(): ?bool
    {
        return $this->returnManualTax;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnManualTax(?bool $returnManualTax): self
    {
        $this->returnManualTax = $returnManualTax;
        return $this;
    }
}
