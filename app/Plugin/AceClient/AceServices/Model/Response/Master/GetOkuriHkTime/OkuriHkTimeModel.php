<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

/**
 * Implement for Okuri Hk Time Response Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */


class OkuriHkTimeModel implements OkuriHkTimeModelInterface
{
    use Haiso\OcodeTrait, 
        Haiso\OnameTrait, 
        Haiso\OsubnameTrait, 
        Denpyo\DenkuNumTrait, 
        Haiso\HcodeTrait, 
        Haiso\HnameTrait, 
        Good\JyouonTrait,  
        Good\ReizouTrait, 
        Good\ReitouTrait, 
        Haiso\HkCodeTrait, 
        Haiso\HkNameTrait; 

}