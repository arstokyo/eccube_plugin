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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface MemberModelInterface
 *
 * @author kmorino
 */
interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Nmember
     *
     * @return NmemberModel[]|null
     */
    public function getNmember(): ?array;

    /**
     * Set Nmember
     *
     * @param NmemberModel[]|null $Nmember
     *
     * @return void
     */
    public function setNmember(?array $Nmember): void;
}
