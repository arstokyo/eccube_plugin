<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuri;

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
     * Okuri
     *
     * @var OkuriModel[]|null $okuri
     */
    protected ?array $okuri  = null;

    /**
     * {@inheritDoc}
     */
    function getOkuri(): ?array
    {
        return $this->okuri;
    }

    /**
    * {@inheritDoc}
    */
    function setOkuri(array|null $okuri): void
    {
        $this->okuri = $okuri;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'okuri' => OkuriModel::class
               ];
    }
}