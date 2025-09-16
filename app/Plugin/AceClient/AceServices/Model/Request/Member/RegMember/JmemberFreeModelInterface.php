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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

interface JmemberFreeModelInterface
{
    /**
     * Get JmemFree
     *
     * @return JmemFreeModel[]|null
     */
    public function getJmemFree(): ?array;

    /**
     * Set JyudenFree
     *
     * @param JmemFreeModel[]|null $jmemFree
     *
     * @return self
     */
    public function setJmemFree(?array $jmemFree): self;
}
