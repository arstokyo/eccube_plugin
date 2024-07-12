<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetId;

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
     * Id
     *
     * @var IdModel[]|null $id
     */
    protected ?array $id  = null;

    /**
     * {@inheritDoc}
     */
    function getId(): ?array
    {
        return $this->id;
    }

    /**
    * {@inheritDoc}
    */
    function setId(?array $id): void
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'id' => IdModel::class
               ];
    }
}