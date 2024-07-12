<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai;

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
     * Baitai
     *
     * @var BaitaiModel[]|null $baitai
     */
    protected ?array $baitai  = null;

    /**
     * {@inheritDoc}
     */
    function getBaitai(): ?array
    {
        return $this->baitai;
    }

    /**
    * {@inheritDoc}
    */
    function setBaitai(?array $baitai): void
    {
        $this->baitai = $baitai;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'baitai' => BaitaiModel::class
               ];
    }
}