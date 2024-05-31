<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime\MasterModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Master Model for Okuri Hk Time Response
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var Response\Master\GetOkuriHkTime\OkuriHkTimeModelInterface[]|null $Okuri Okuri
     */
    private ?array $Okuri = null;

    /**
     * {@inheritDoc}
     */
    public function getOkuri(): array|null 
    {
        return $this->Okuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkuri(array|null $okuri): void 
    {
        $this->Okuri = $okuri;
    }
    

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array 
    {
        return [
            'Okuri' => GetOkuriHkTime\OkuriHkTimeModel::class
        ];
    }
}