<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

/**
 * Interface for Master Model for Okuri Hk Time Response
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */


interface MasterModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Okuri
     * 
     * @return 
     */
     public function getOkuri(): array|null;

    /**
     * Set Okuri
     * 
     * @param
     * @return void
     */
    public function setOkuri(array|null $Okuri): void;

      
    
}