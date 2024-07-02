<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetSouko;

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
     * Souko
     *
     * @var SoukoModel[]|null $souko
     */
    protected ?array $souko  = null;

    /**
     * {@inheritDoc}
     */
    function getSouko(): ?array
    {
        return $this->souko;
    }

    /**
    * {@inheritDoc}
    */
    function setSouko(array|null $souko): void
    {
        $this->souko = $souko;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'souko' => SoukoModel::class
               ];
    }
}