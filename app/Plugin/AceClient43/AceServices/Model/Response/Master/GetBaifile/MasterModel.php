<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaifile;

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
     * Baifile
     *
     * @var BaifileModel[]|null $baifile
     */
    protected ?array $baifile  = null;

    /**
     * {@inheritDoc}
     */
    function getBaifile(): ?array
    {
        return $this->baifile;
    }

    /**
    * {@inheritDoc}
    */
    function setBaifile(?array $baifile): void
    {
        $this->baifile = $baifile;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'baifile' => BaifileModel::class
               ];
    }
}