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

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasIdInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface RegMemAdrRequestInterface
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RegMemAdrRequestModelInterface extends RequestModelInterface, HasIdInterface
{
    /**
     * Get 顧客住所　情報
     *
     * @return MemberPrmModel
     */
    public function getPrm(): MemberPrmModelInterface;

    /**
     * Set 顧客住所　情報
     *
     * @param MemberPrmModel $prm
     *
     * @return self
     */
    public function setPrm(MemberPrmModelInterface $prm): self;
}
