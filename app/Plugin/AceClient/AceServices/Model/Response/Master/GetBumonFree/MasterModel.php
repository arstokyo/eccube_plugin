<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFree;

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
     * BumonFree
     *
     * @var BumonFreeModel[]|null $bumonFree
     */
    protected ?array $bumonFree  = null;

    /**
     * {@inheritDoc}
     */
    function getBumonFree(): ?array
    {
        return $this->bumonFree;
    }

    /**
    * {@inheritDoc}
    */
    function setBumonFree(?array $bumonFree): void
    {
        $this->bumonFree = $bumonFree;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'BumonFree' => BumonFreeModel::class
               ];
    }
}