<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request;
use Symfony\Component\Serializer\Annotation\SerializedName;

interface RegMemberRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     * 
     * @param Request\Member\RegMember\MemberPrmModel $prm
     * @return self
     */
    public function setPrm(MemberPrmModel $prm): self;
   
    /**
     * Get オーダー情報
     * 
     * @return Request\Member\RegMember\MemberPrmModel
     */
    public function getPrm(): MemberPrmModelInterface;

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("sessid") */
    public function setSessId(?string $sessId);
}
