<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PersonModelRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Dependency\MemberModelRequestAbstract;

class MemberModelAbstract extends MemberModelRequestAbstract implements MemberModelInterface
{
    protected PersonModelInterface $jmember;
    protected NmemModelInterface $nmember;
    protected PersonModelInterface $smember;

    /**
     * Set 受注先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelAbstract $jmember
     */
    public function setJmember(PersonModelInterface $jmember): void
    {
        $this->jmember = $jmember;
    }

    /**
     * Set 納品先顧客情報
     * 
     * @param Jyuden\Dependency\NmemModelAbstract $nmember
     */
    public function setNmember(NmemModelInterface $nmember): void
    {
        $this->nmember = $nmember;
    }

    /**
     * Set 請求先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelAbstract $smember
     */
    public function setSmember(PersonModelInterface $smember): void
    {
        $this->smember = $smember;
    }
}