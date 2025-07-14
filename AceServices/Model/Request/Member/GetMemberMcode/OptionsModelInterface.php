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

interface OptionsModelInterface
{
    /**
     * Get ReturnMemFreeKubun
     *
     * @return string
     */
    public function getReturnMemFreeKubun(): ?string;

    /**
     * Set ReturnMemFreeKubun
     *
     * @param array $returnJdKubun
     *
     * @return self
     */
    public function setReturnMemFreeKubun(?array $returnMemFreeKubun): self;
}
