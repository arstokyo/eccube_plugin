<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetPcode;

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
     * Pcode
     *
     * @var PcodeModel[]|null $pcode
     */
    protected ?array $pcode  = null;

    /**
     * {@inheritDoc}
     */
    function getPcode(): ?array
    {
        return $this->pcode;
    }

    /**
    * {@inheritDoc}
    */
    function setPcode(?array $pcode): void
    {
        $this->pcode = $pcode;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'pcode' => PcodeModel::class
               ];
    }
}