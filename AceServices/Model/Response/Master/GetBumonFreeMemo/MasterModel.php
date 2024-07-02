<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBumonFreeMemo;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * FreeMemo
     *
     * @var FreememoModel[]|null $freeMemo
     */
    protected ?array $freeMemo  = null;

    /**
     * {@inheritDoc}
     */
    function getFreeMemo(): ?array
    {
        return $this->freeMemo;
    }

    /**
    * {@inheritDoc}
    */
    function setFreeMemo(array|null $freeMemo): void
    {
        $this->freeMemo = $freeMemo;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'FreeMemo' => FreememoModel::class
               ];
    }
}