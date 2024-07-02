<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnk;

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
     * MemAnk
     *
     * @var MemAnkModel[]|null $memAnk
     */
    protected ?array $memAnk  = null;

    /**
     * {@inheritDoc}
     */
    function getMemAnk(): ?array
    {
        return $this->memAnk;
    }

    /**
    * {@inheritDoc}
    */
    function setMemAnk(array|null $memAnk): void
    {
        $this->memAnk = $memAnk;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'MemAnk' => MemAnkModel::class
               ];
    }
}