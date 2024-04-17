<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency\MemberJyudenRequestModelInterface;
use Plugin\AceClient\AceService\Model\Request\Dependency\PersonModelRequestAbstract;
use Plugin\AceClient\AceService\Model\Request\Dependency\PersonModelRequestInterface;
use plugin\AceClient\AceService\Model\Request\Dependency\MemberModelRequestAbstract;
use Plugin\AceClient\AceService\Model\Request\Dependency\NmemModelRequestAbstract;

class MemberJyudenRequestModelAbstract extends MemberModelRequestAbstract implements MemberJyudenRequestModelInterface
{
    protected PersonJyudenRequestModelAbstract $jmember;
    protected NmemJyudenRequestModel $nmember;
    protected PersonJyudenRequestModelAbstract $smember;

    /**
     * Set 受注先顧客情報
     * 
     * @param PersonJyudenRequestModelAbstract $jmember
     */
    public function setJmember(PersonModelRequestInterface $jmember)
    {
        $this->jmember = $jmember;
    }

    /**
     * Set 納品先顧客情報
     * 
     * @param NmemJyudenRequestModel $nmember
     */
    public function setNmember(PersonModelRequestInterface $nmember)
    {
        return $this->nmember = $nmember;
    }

    /**
     * Set 請求先顧客情報
     * 
     * @param PersonJyudenRequestModelAbstract $smember
     */
    public function setSmember(PersonModelRequestInterface $smember)
    {
        $this->smember = $smember;
    }
}