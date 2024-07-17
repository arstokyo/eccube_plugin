<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGtanka;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var GoodTankaModelGroup1[]|null $Gzai Gzai
     */
    private ?array $Gzai = null;

    /**
     * {@inheritDoc}
     */
    public function getGzai(): ?array
    {
        return $this->Gzai;
    }

    /**
     * {@inheritDoc}
     */
    public function setGzai(?array $gzai): void
    {
        $this->Gzai = $gzai;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Gtanka' =>GoodTankaModelGroup1::class
               ];
    }
}