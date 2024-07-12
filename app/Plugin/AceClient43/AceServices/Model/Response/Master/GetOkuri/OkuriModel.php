<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class OkuriModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class OkuriModel implements OkuriModelInterface
{
    use Haiso\OcodeTrait,
        Haiso\OnameTrait,
        Haiso\HcodeTrait,
        Haiso\HnameTrait,
        Good\JyouonTrait,
        Good\ReizouTrait,
        Good\ReitouTrait,
        NoCategory\KubunTrait;
}