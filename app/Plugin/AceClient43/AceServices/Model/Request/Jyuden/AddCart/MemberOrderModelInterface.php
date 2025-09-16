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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Person;

/**
 * Interface Member Order Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemberOrderModelInterface
{
    /**
     * Set 受注先顧客情報
     *
     * @param JmemberModel|null $jmember
     *
     * @return self
     */
    public function setJmember(?Person\Jmember\JmemberModelInterface $jmember): self;

    /**
     * Get 受注先顧客情報
     *
     * @return JmemberModel|null
     */
    public function getJmember(): ?Person\Jmember\JmemberModelInterface;

    /**
     * Set 納品先顧客情報
     *
     * @param NmemberModel|null $nmember
     *
     * @return self
     */
    public function setNmember(?Person\Nmember\NmemberModelInterface $nmember): self;

    /**
     * Get 納品先顧客情報
     *
     * @return NmemberModel|null
     */
    public function getNmember(): ?Person\Nmember\NmemberModelInterface;

    /**
     * Set 請求先顧客情報
     *
     * @param SmemberModel|null $smember
     *
     * @return self
     */
    public function setSmember(?Person\Smember\SmemberModelInterface $smember): self;

    /**
     * Get 請求先顧客情報
     *
     * @return SmemberModel|null
     */
    public function getSmember(): ?Person\Smember\SmemberModelInterface;
}
