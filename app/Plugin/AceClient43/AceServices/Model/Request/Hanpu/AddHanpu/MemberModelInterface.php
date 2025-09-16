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

/**
 * Interface MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface
{
    /**
     * Get 受注顧客情報
     *
     * @return JmemberModel|null
     */
    public function getJmember(): ?JmemberModelInterface;

    /**
     * Set 受注顧客情報
     *
     * @param JmemberModel|null $jmember
     *
     * @return self
     */
    public function setJmember(?JmemberModelInterface $jmember): self;

    /**
     * Get 納品先顧客情報
     *
     * @return NmemberModelInterface|null
     */
    public function getNmember(): ?NmemberModelInterface;

    /**
     * Set 納品先顧客情報
     *
     * @param NmemberModel|null $nmember
     *
     * @return self
     */
    public function setNmember(?NmemberModelInterface $nmember): self;

    /**
     * Get 請求先顧客情報
     *
     * @return SmemberModelInterface|null
     */
    public function getSmember(): ?SmemberModelInterface;

    /**
     * Set 請求先顧客情報
     *
     * @param SmemberModel|null $smember
     *
     * @return self
     */
    public function setSmember(?SmemberModelInterface $smember): self;
}
