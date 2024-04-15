<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Dependency\PersonModelRequestInterface;
use Plugin\AceClient\AceService\Model\Request\Dependency\MemberModelRequestInterface;

interface MemberJyudenRequestModelInterface extends MemberModelRequestInterface
{
    /**
     * Get 受注先顧客情報
     * 
     * @return PersonModelRequestInterface
     */
    public function GetJmember(): PersonModelRequestInterface;

    /**
     * Get 納品先顧客情報
     * 
     * @return PersonModelRequestInterface
     */
    public function GetNmember(): PersonModelRequestInterface;

    /**
     * Get 請求先顧客情報
     * 
     * @return PersonModelRequestInterface
     */
    public function GetSmember(): PersonModelRequestInterface;
}