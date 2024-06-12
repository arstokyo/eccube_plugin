<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

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
     * @return Response\Member\UpdateSbpsCustId\GetsbpscustidModelInterface
     */
    public function getGetSbpsCustId(): GetsbpscustidModelInterface;

    /**
     * Set GetSbpsCustIdModel
     *
     * @param Response\Member\UpdateSbpsCustId\GetsbpscustidModel $GetSbpsCustId
     */
    public function setGetSbpsCustId(GetsbpscustidModel $GetSbpsCustId): void;
}