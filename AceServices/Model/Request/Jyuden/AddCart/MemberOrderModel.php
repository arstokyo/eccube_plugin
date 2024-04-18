<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\PersonModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\NmemModelInterface;
use Plugin\AceClient\AceServices\Model\Request;

class MemberOrderModel extends MemberModelAbstract implements MemberModelInterface
{

    /**
     * Set 受注先顧客情報
     * 
     * @param Request\Jyuden\AddCart\PersonModel $jmember
     * @return Request\Jyuden\AddCart\MemberOrderModel
     */
    public function setJmember(PersonModelInterface $jmember): self
    {
        $this->jmember = $jmember;
        return $this;
    }

        /**
     * Set 納品先顧客情報
     * 
     * @param Request\Jyuden\AddCart\NmemModel $nmember
     * @return Request\Jyuden\AddCart\MemberOrderModel
     */
    public function setNmember(NmemModelInterface $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }

    /**
     * Set 請求先顧客情報
     * 
     * @param Request\Jyuden\AddCart\PersonModel $smember
     * @return Request\Jyuden\AddCart\MemberOrderModel
     */
    public function setSmember(PersonModelInterface $smember): self
    {
        $this->smember = $smember;
        return $this;
    }


}

