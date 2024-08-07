<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnkFreeCd;

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
     * FreeCd
     *
     * @var FreeCdModel[]|null $freeCd
     */
    protected ?array $freeCd  = null;

    /**
     * {@inheritDoc}
     */
    function getFreeCd(): ?array
    {
        return $this->freeCd;
    }

    /**
    * {@inheritDoc}
    */
    function setFreeCd(?array $freeCd): void
    {
        $this->freeCd = $freeCd;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'FreeCd' => FreeCdModel::class
               ];
    }
}