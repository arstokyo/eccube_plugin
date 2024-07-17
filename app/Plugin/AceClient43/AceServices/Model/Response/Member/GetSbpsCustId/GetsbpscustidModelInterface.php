<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Getsbpscustid Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetsbpscustidModelInterface extends HasMessageModelInterface,
                                              AsListDenormalizableInterface
{
    /**
     * Get Sbpscustid
     *
     * @return SbpscustidModel[]|null
     */
    public function getSbpscustid(): ?array;

    /**
     * Set Sbpscustid
     *
     * @param SbpscustidModel[]|null $sbpscustid
     * @return void
     */
    public function setSbpscustid(?array $sbpscustid): void;
}