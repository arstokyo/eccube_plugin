<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\MemberModelRequestInterface;

interface MemberModelInterface extends MemberModelRequestInterface
{
    /**
     * Set 受注先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelInterface $jmember
     */
    public function setJmember(PersonModelInterface $jmember): void;

    /**
     * Set 納品先顧客情報
     * 
     * @param Jyuden\Dependency\NmemModelInterface $nmember
     */
    public function setNmember(NmemModelInterface $nmember): void;

    /**
     * Set 請求先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelInterface $smember
     */
    public function setSmember(PersonModelInterface $smember): void;
}