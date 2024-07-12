<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for GetSbpsCustIdResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetSbpsCustIdResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get GetSbpsCustIdModel
     *
     * @return Response\Member\GetSbpsCustId\GetsbpscustidModelInterface
     */
    public function getGetSbpsCustId(): GetsbpscustidModelInterface;

    /**
     * Set GetSbpsCustIdModel
     *
     * @param Response\Member\GetSbpsCustId\GetsbpscustidModel $GetSbpsCustId
     */
    public function setGetSbpsCustId(GetsbpscustidModel $GetSbpsCustId): void;
}