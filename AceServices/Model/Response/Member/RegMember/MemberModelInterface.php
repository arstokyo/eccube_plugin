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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/*
 * Interface for Member Model
 *
 * @author kmorino
 */
interface MemberModelInterface extends HasMessageModelInterface
{
    /**
     * Get Nmem
     *
     * @return JmemModel|null
     */
    public function getJmember(): ?JmemModel;

    /**
     * Set Nmem
     *
     * @param JmemModel|null $jmember
     *
     * @return self
     */
    public function setJmember(?JmemModel $jmember): self;

    /**
     * Get Nmem
     *
     * @return NmemModel|null
     */
    public function getNmember(): ?NmemModel;

    /**
     * Set Nmem
     *
     * @param NmemModel|null $nmember
     *
     * @return self
     */
    public function setNmember(?NmemModel $nmember): self;

    /**
     * Get Nmem
     *
     * @return SmemModel|null
     */
    public function getSmember(): ?SmemModel;

    /**
     * Set Nmem
     *
     * @param SmemModel|null $smember
     *
     * @return self
     */
    public function setSmember(?SmemModel $smember): self;
}
