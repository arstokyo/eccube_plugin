<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceService\Model\Request\Dependency\PersonModelRequestInterface;
use Plugin\AceClient\AceService\Model\Request\Dependency\MemberModelRequestInterface;

interface MemberJyudenRequestModelInterface extends MemberModelRequestInterface
{
    /**
     * Set 受注先顧客情報
     * 
     * @param PersonJyudenRequestModelInterface $jmember
     */
    public function setJmember(PersonModelRequestInterface $jmember);

    /**
     * Set 納品先顧客情報
     * 
     * @param PersonJyudenRequestModelInterface $nmember
     */
    public function setNmember(PersonModelRequestInterface $nmember);

    /**
     * Set 請求先顧客情報
     * 
     * @param PersonJyudenRequestModelInterface $smember
     */
    public function setSmember(PersonModelRequestInterface $smember);
}