<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFreeMemo;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

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
    function setFreeMemo(?array $freeMemo): void
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