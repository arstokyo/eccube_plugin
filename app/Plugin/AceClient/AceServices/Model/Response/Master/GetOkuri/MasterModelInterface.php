<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get Okuri
    *
    * @return OkuriModel[]|null
    */
    public function getOkuri(): ?array;

    /**
     * Set Okuri
     *
     * @param OkuriModel[]|null $okuri
     * @return void
     */
    public function setOkuri(?array $okuri): void;
}