<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class OkuriModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class OkuriModel implements OkuriModelInterface
{
    use Haiso\OcodeTrait;
    use Haiso\OnameTrait;
    use Haiso\HcodeTrait;
    use Haiso\HnameTrait;
    use Good\JyouonTrait;
    use Good\ReizouTrait;
    use Good\ReitouTrait;
    use NoCategory\KubunTrait;
}
