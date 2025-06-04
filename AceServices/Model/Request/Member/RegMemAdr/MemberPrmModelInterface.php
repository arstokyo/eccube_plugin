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

use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModelInterface;
use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

interface MemberPrmModelInterface extends PrmModelInterface
{
    /**
     * Get 納品先
     *
     * @return Request\Member\RegMemAdr\NmemberModelInterface|null
     */
    public function getNmember(): ?NmemberModelInterface;

    /**
     * Set 納品先
     *
     * @param NmemberModel|null $nmember
     *
     * @return self
     */
    public function setNmember(?NmemberModelInterface $nmember): self;
}
