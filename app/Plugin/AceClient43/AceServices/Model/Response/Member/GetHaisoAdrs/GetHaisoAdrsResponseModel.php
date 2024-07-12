<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author kmorino
 */

class GetHaisoAdrsResponseModel extends ResponseModelAbtract implements GetHaisoAdrsResponseModelInterface
{

    /**
     * Member
     *
     * @var MemberModel $member
     */
    protected MemberModel $member;

    /**
     * @return Response\Member\getHaisoAdrs\MemberModel
     */
    function getMember(): MemberModel
    {
        return $this->member;
    }

    /**
    * @param Response\Member\getHaisoAdrs\MemberModel $member
    */
    function setMember(MemberModel $member): self
    {
        $this->member = $member;
        return $this;
    }

}