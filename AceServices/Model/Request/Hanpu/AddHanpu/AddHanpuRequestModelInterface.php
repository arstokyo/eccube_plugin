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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface AddHanpuRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     *
     * @param HanpuPrmModel $prm
     *
     * @return self
     */
    public function setPrm(HanpuPrmModelInterface $prm): self;

    /**
     * Get オーダー情報
     *
     * @return HanpuPrmModel
     */
    public function getPrm(): HanpuPrmModelInterface;
}
