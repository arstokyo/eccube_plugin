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

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

/**
 * Interface for オーダー情報
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OrderPrmModelInterface extends PrmModelInterface
{
    /**
     * Set 顧客情報
     *
     * @param MemberOrderModel|null $member
     *
     * @return self
     */
    public function setMember(?MemberOrderModelInterface $member): self;

    /**
     * Get 顧客情報
     *
     * @return MemberOrderModel|null
     */
    public function getMember(): ?MemberOrderModelInterface;

    /**
     * Get オーダー情報
     *
     * @return JyudenModelInterface|null
     */
    public function getJyuden(): ?JyudenModelInterface;

    /**
     * Set オーダー情報
     *
     * @param JyudenModel|null $jyuden
     *
     * @return self
     */
    public function setJyuden(?JyudenModelInterface $jyuden): self;

    /**
     * Get JyudenFree
     *
     * @return JyudenFreeModelInterface[]|null
     */
    public function getJyudenFree(): ?array;

    /**
     * Set JyudenFree
     *
     * @param JyudenFreeModel[]|null $jyudenFree
     *
     * @return self
     */
    public function setJyudenFree(?array $jyudenFree): self;

    /**
     * Get 詳細情報
     *
     * @return DetailModelInterface|null
     */
    public function getDetail(): ?DetailModelInterface;

    /**
     * Set 詳細情報
     *
     * @param DetailModel|null $detail
     *
     * @return self
     */
    public function setDetail(?DetailModelInterface $detail): self;

    /**
     * Get Mail情報
     *
     * @return MailJyudenModel|null
     */
    public function getMailjyuden(): ?MailJyudenModel;

    /**
     * Set Mail情報
     *
     * @param MailJyudenModel|null $mailjyuden
     *
     * @return self
     */
    public function setMailjyuden(?MailJyudenModel $mailjyuden): self;
}
