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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\User\HasUserIdInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface for Get Member Request
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface GetMemberRequestModelInterface extends RequestModelInterface, HasUserIdInterface, NoCategory\HasPassWdInterface
{
    /**
     * Get IdPrm
     *
     * @return IdPrmModelInterface
     */
    public function getIdPrm(): IdPrmModelInterface;

    /**
     * Set IdPrm
     *
     * @param IdPrmModelInterface $idPrm
     *
     * @return self
     */
    public function setIdPrm(IdPrmModelInterface $idPrm): self;
}
