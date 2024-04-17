<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\MemberModelRequestAbstract;

class MemberModelAbstract extends MemberModelRequestAbstract implements MemberModelInterface
{
    protected PersonModelInterface $jmember;
    protected NmemModelInterface $nmember;
    protected PersonModelInterface $smember;

    /**
     * Set 受注先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelInterface $jmember
     * @return Jyuden\Dependency\MemberModelAbstract
     */
    public function setJmember(PersonModelInterface $jmember): self
    {
        $this->jmember = $jmember;
        return $this;
    }

    /**
     * Set 納品先顧客情報
     * 
     * @param Jyuden\Dependency\NmemModelInterface $nmember
     * @return Jyuden\Dependency\MemberModelAbstract
     */
    public function setNmember(NmemModelInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * Set 請求先顧客情報
     * 
     * @param Jyuden\Dependency\PersonModelInterface $smember
     * @return Jyuden\Dependency\MemberModelAbstract
     */
    public function setSmember(PersonModelInterface $smember): self
    {
        $this->smember = $smember;
        return $this;
    }
}