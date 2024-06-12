<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetSbpsCustIdResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetSbpsCustIdResponseModel extends ResponseModelAbtract implements GetSbpsCustIdResponseModelInterface
{
    /**
     * @var GetsbpscustidModelInterface $Member
     */
    protected GetsbpscustidModelInterface $Member;

    /**
     * {@inheritDoc}
     */
    public function getGetSbpsCustId(): GetsbpscustidModelInterface
    {
        return $this->Member;
    }

    /**
     * {@inheritDoc}
     */
    public function setGetSbpsCustId(GetsbpscustidModel $member): void
    {
        $this->Member = $member;
    }

}