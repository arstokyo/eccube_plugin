<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;
use Symfony\Component\Serializer\SerializerInterface;
use Plugin\AceClient\AceServices\Model\Response\HandleResponseAsListTrait;


/**
 * Class GetHaisoAdrsRequestModel
 *
 * @author kmorino
 */

class GetHaisoAdrsResponseModel extends ResponseModelAbtract implements GetHaisoAdrsResponseModelInterface
{
    use HandleResponseAsListTrait;

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
        if (!empty($this->getMember()->getGetHaisouAdrs()) && \method_exists($serializer, 'denormalize')) {
            return $this->setMember($this->denormalizeMemberModel($serializer));
        }
        return $this;
    }


    /**
     * Denormalize member model
     *
     * @param SerializerInterface $serializer
     *
     * @return MemberModel
     */
    private function denormalizeMemberModel(SerializerInterface $serializer): MemberModel
    {
        return $this->getMember()->setGetHaisouAdrs(
                                    $this->denormalizeResponseAsList($this->getMember()->getGetHaisouAdrs(), 
                                                                     GetHaisouAdrsModel::class, 
                                                                     $serializer
                                    )
                                  );
    }

}