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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface CheckDuplicationMemberRequestModelInterface extends RequestModelInterface, NoCategory\HasSyidInterface
{
    /**
     * Set 顧客情報
     *
     * @param MemberPrmModel $prm
     *
     * @return self
     */
    public function setPrm(MemberPrmModel $prm): self;

    /**
     * Get 顧客情報
     *
     * @return MemberPrmModel
     */
    public function getPrm(): MemberPrmModelInterface;
}
