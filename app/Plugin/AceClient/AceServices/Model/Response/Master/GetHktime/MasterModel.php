<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHktime;

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
     * Hktime
     *
     * @var HktimeModel[]|null $hktime
     */
    protected ?array $hktime  = null;

    /**
     * {@inheritDoc}
     */
    function getHktime(): ?array
    {
        return $this->hktime;
    }

    /**
    * {@inheritDoc}
    */
    function setHktime(?array $hktime): void
    {
        $this->hktime = $hktime;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'hktime' => HktimeModel::class
               ];
    }
}