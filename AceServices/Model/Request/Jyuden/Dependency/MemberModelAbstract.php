<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\MemberModelRequestAbstract;

class MemberModelAbstract extends MemberModelRequestAbstract implements MemberModelInterface
{
    protected PersonModelInterface $jmember;
    protected NmemModelInterface $nmember;
    protected PersonModelInterface $smember;

    /**
     * Set 受注先顧客情報
     * 
     * @param Request\Jyuden\Dependency\PersonModelInterface $jmember
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function setJmember(PersonModelInterface $jmember): self
    {
        $this->jmember = $jmember;
        return $this;
    }

    /**
     * Get 受注先顧客情報
     * 
     * @return Request\Jyuden\Dependency\PersonModelInterface
     */
    public function getJmember(): PersonModelInterface
    {
        return $this->jmember;
    }

    /**
     * Set 納品先顧客情報
     * 
     * @param Request\Jyuden\Dependency\NmemModelInterface $nmember
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function setNmember(NmemModelInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * Get 納品先顧客情報
     * 
     * @return Request\Jyuden\Dependency\NmemModelInterface
     */
    public function getNmember(): NmemModelInterface
    {
        return $this->nmember;
    }

    /**
     * Set 請求先顧客情報
     * 
     * @param Request\Jyuden\Dependency\PersonModelInterface $smember
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function setSmember(PersonModelInterface $smember): self
    {
        $this->smember = $smember;
        return $this;
    }

    /**
     * Get 請求先顧客情報
     * 
     * @return Request\Jyuden\Dependency\PersonModelInterface
     */
    public function getSmember(): PersonModelInterface
    {
        return $this->smember;
    }
    
}