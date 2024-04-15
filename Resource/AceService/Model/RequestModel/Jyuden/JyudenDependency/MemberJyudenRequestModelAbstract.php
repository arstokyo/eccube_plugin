<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency\MemberJyudenRequestModelInterface;
use Plugin\AceClient\AceService\Model\Request\Dependency\PersonModelRequestAbstract;
use plugin\AceClient\AceService\Model\Request\Dependency\MemberModelRequestAbstract;
use Plugin\AceClient\AceService\Model\Request\Dependency\NmemModelRequestAbstract;

class MemberJyudenRequestModelAbstract extends MemberModelRequestAbstract implements MemberJyudenRequestModelInterface
{
    private PersonModelRequestAbstract $jmember;
    private NmemModelRequestAbstract $nmember;
    private PersonModelRequestAbstract $smember;

    /**
     * Get 受注先顧客情報
     * 
     * @return PersonModelRequestAbstract
     */
    public function GetJmember(): PersonModelRequestAbstract
    {
        return $this->jmember;
    }

    /**
     * Get 納品先顧客情報
     * 
     * @return NmemModelRequestAbstract
     */
    public function GetNmember(): NmemModelRequestAbstract
    {
        return $this->nmember;
    }

    /**
     * Get 請求先顧客情報
     * 
     * @return PersonModelRequestAbstract
     */
    public function GetSmember(): PersonModelRequestAbstract
    {
        return $this->smember;
    }
}