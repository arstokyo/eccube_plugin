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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    private ?string $returnJdKubun = null;

    private ?string $returnJmKubun = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnJdKubun(): ?string
    {
        return $this->returnJdKubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnJdKubun(?array $returnJdKubun): self
    {
        if (is_array($returnJdKubun)) {
            $this->returnJdKubun = implode(',', $returnJdKubun);
        } else {
            $this->returnJdKubun = '';
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getReturnJmKubun(): ?string
    {
        return $this->returnJmKubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnJmKubun(?array $returnJmKubun): self
    {
        if (is_array($returnJmKubun)) {
            $this->returnJmKubun = implode(',', $returnJmKubun);
        } else {
            $this->returnJmKubun = '';
        }

        return $this;
    }
}
