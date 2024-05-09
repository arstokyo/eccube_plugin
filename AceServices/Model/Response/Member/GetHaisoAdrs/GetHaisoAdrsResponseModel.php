<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * {@inheritDoc}
     */
    public function denomarlizeInnerData(SerializerInterface $serializer): self
    {
        if (($this->getMember()->getGetHaisouAdrs()) && \method_exists($serializer, 'denormalize')) {
            return $this->setMember($this->denormalizeMemberModel($serializer));
        }
        return $this;
    }


    /**
     * Denormalize member model
     *
     * @param Serializer $serializer
     *
     * @return MemberModel
     */
    private function denormalizeMemberModel(SerializerInterface $serializer): MemberModel
    {
        return $this->getMember()->setGetHaisouAdrs(
                                    $serializer->denormalize($this->getMember()->getGetHaisouAdrs(), GetHaisouAdrsModel::class . '[]')
                                  );
    }

}