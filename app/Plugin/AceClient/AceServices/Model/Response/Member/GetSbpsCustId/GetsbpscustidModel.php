<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for GetsbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetsbpscustidModel implements GetsbpscustidModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var SbpscustidModel[]|null $sbpscustid sbpscustid
     */
    private ?array $sbpscustid = null;

    /**
     * {@inheritDoc}
     */
    public function getSbpscustid(): ?array
    {
        return $this->sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbpscustid(array|null $sbpscustid): void
    {
        $this->sbpscustid = $sbpscustid;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['sbpscustid' => SbpscustidModel::class];
    }
}