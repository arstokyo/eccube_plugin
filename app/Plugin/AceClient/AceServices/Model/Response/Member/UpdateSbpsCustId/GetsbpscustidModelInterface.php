<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for GetSbpsCustId Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetsbpscustidModelInterface extends HasMessageModelInterface
{
    /**
     * Get Sbpscustid
     *
     * @return SbpscustidModel
     */
    public function getSbpscustid(): ?SbpscustidModel;

    /**
     * Set Sbpscustid
     *
     * @param SbpscustidModel $sbpscustid
     * @return void
     */
    public function setSbpscustid(?SbpscustidModel $sbpscustid): void;
}