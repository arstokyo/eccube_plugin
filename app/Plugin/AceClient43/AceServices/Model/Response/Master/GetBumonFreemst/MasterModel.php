<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreemst;

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
     * Freemst
     *
     * @var FreemstModel[]|null $freemst
     */
    protected ?array $freemst  = null;

    /**
     * {@inheritDoc}
     */
    function getFreemst(): ?array
    {
        return $this->freemst;
    }

    /**
    * {@inheritDoc}
    */
    function setFreemst(?array $freemst): void
    {
        $this->freemst = $freemst;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Freemst' => FreemstModel::class
               ];
    }
}