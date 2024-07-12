<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for GetsbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetsbpscustidModel implements GetsbpscustidModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var SbpscustidModel $sbpscustid sbpscustid
     */
    private ?SbpscustidModel $sbpscustid = null;

    /**
     * {@inheritDoc}
     */
    public function getSbpscustid(): ?SbpscustidModel
    {
        return $this->sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbpscustid(?SbpscustidModel $sbpscustid): void
    {
        $this->sbpscustid = $sbpscustid;
    }
}