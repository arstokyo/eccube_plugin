<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetJcode;

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
     * Jcode
     *
     * @var JcodeModel[]|null $jcode
     */
    protected ?array $jcode  = null;

    /**
     * {@inheritDoc}
     */
    function getJcode(): ?array
    {
        return $this->jcode;
    }

    /**
    * {@inheritDoc}
    */
    function setJcode(?array $jcode): void
    {
        $this->jcode = $jcode;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'jcode' => JcodeModel::class
               ];
    }
}