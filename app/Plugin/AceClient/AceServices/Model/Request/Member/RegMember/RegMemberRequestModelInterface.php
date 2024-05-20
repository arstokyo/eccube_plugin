<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request;
use Symfony\Component\Serializer\Annotation\SerializedName;

interface RegMemberRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     * 
     * @param Request\Member\RegMember\MemberModel $prm
     * @return Request\Member\RegMember\RegMemberRequestModel
     */
    public function setPrm(MemberModel $prm): self;
   
    /**
     * Get オーダー情報
     * 
     * @return Request\Member\RegMember\MemberModel
     */
    public function getPrm(): MemberModelInterface;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('sessid')]
    public function setSessId(?string $sessId): static;
}
