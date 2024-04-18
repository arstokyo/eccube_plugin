<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\MemberModelRequestInterface;

interface MemberModelInterface extends MemberModelRequestInterface
{
    /**
     * Set 受注先顧客情報
     * 
     * @param Request\Jyuden\Dependency\PersonModelInterface $jmember
     * @return Request\Jyuden\Dependency\MemberModelInterface
     */
    public function setJmember(PersonModelInterface $jmember): self;

    /**
     * Set 納品先顧客情報
     * 
     * @param Request\Jyuden\Dependency\NmemModelInterface $nmember
     * @return Request\Jyuden\Dependency\MemberModelInterface
     */
    public function setNmember(NmemModelInterface $nmember): self;

    /**
     * Set 請求先顧客情報
     * 
     * @param Request\Jyuden\Dependency\PersonModelInterface $smember
     * @return Request\Jyuden\Dependency\MemberModelInterface
     */
    public function setSmember(PersonModelInterface $smember): self;
}