<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Request;

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
     * @return Request\Hanpu\AddHanpu\JmemberModel|null
     */
    public function getJmember(): ?JmemberModelInterface;

    /**
     * Set 受注顧客情報
     *
     * @param Request\Hanpu\AddHanpu\JmemberModel|null $jmember
     * @return self
     */
    public function setJmember(?JmemberModelInterface $jmember): self;

    /**
     * Get 納品先顧客情報
     *
     * @return Request\Hanpu\AddHanpu\NmemberModelInterface|null
     */
    public function getNmember(): ?NmemberModelInterface;

    /**
     * Set 納品先顧客情報
     *
     * @param Request\Hanpu\AddHanpu\NmemberModel|null $nmember
     * @return self
     */
    public function setNmember(?NmemberModelInterface $nmember): self;

    /**
     * Get 請求先顧客情報
     *
     * @return Request\Hanpu\AddHanpu\SmemberModelInterface|null
     */
    public function getSmember(): ?SmemberModelInterface;

    /**
     * Set 請求先顧客情報
     *
     * @param Request\Hanpu\AddHanpu\SmemberModel|null $smember
     * @return self
     */
    public function setSmember(?SmemberModelInterface $smember): self;

}