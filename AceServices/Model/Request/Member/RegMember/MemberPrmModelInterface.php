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

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

/**
 * Interface Member Order Model
 *
 * @author kmorino
 */
interface MemberPrmModelInterface extends PrmModelInterface
{
    /**
     * Get 受注先
     *
     * @return JmemberModel|null
     */
    public function getJmember(): ?JmemberModelInterface;

    /**
     * Set 受注先
     *
     * @param JmemberModel|null $jmember
     *
     * @return self
     */
    public function setJmember(?JmemberModelInterface $jmember): self;

    /**
     * Get 納品先
     *
     * @return NmemberModelInterface|null
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

    /**
     * Get 請求先
     *
     * @return SmemberModelInterface|null
     */
    public function getSmember(): ?SmemberModelInterface;

    /**
     * Set 請求先
     *
     * @param SmemberModel|null $smember
     *
     * @return self
     */
    public function setSmember(?SmemberModelInterface $smember): self;
}
