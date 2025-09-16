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

interface OptionsModelInterface
{
    /**
     * Get ReturnJdKubun
     *
     * @return string
     */
    public function getReturnJdKubun(): ?string;

    /**
     * Set ReturnJdKubun
     *
     * @param array $returnJdKubun
     *
     * @return self
     */
    public function setReturnJdKubun(?array $returnJdKubun): self;

    /**
     * Get ReturnJmKubun
     *
     * @return string
     */
    public function getReturnJmKubun(): ?string;

    /**
     * Set ReturnJmKubun
     *
     * @param array $returnJmKubun
     *
     * @return self
     */
    public function setReturnJmKubun(?array $returnJmKubun): self;
}
