<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFree;

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
     * GoodsFree
     *
     * @var GoodsFreeModel[]|null $goodsFree
     */
    protected ?array $goodsFree  = null;

    /**
     * {@inheritDoc}
     */
    function getGoodsFree(): ?array
    {
        return $this->goodsFree;
    }

    /**
    * {@inheritDoc}
    */
    function setGoodsFree(?array $goodsFree): void
    {
        $this->goodsFree = $goodsFree;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'GoodsFree' => GoodsFreeModel::class
               ];
    }
}