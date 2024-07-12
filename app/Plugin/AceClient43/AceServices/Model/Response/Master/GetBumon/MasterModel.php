<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumon;

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
     * Bumon
     *
     * @var BumonModel[]|null $bumon
     */
    protected ?array $bumon  = null;

    /**
     * {@inheritDoc}
     */
    function getBumon(): ?array
    {
        return $this->bumon;
    }

    /**
    * {@inheritDoc}
    */
    function setBumon(?array $bumon): void
    {
        $this->bumon = $bumon;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'bumon' => BumonModel::class
               ];
    }
}