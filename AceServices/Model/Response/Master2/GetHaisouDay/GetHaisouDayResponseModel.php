<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master2\GetHaisouDay;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Get Haisou Day Response Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetHaisouDayResponseModel extends ResponseModelAbtract implements GetHaisouDayResponseModelInterface
{
    /** @var ?int $day */
    protected ?int $day = null;

    /**
     * {@inheritDoc}
     */
    public function getDay(): ?int
    {
        return $this->day;
    }

    /**
     * {@inheritDoc}
     */
    public function setDay(?int $day): void
    {
        $this->day = $day;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchSpecificResponseNodeName(): string
    {
        return 'getHaisouDayResponse';
    }

}