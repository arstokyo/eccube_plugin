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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Implement for Okuri Hk Time Response Model
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
class OkuriHkTimeModel implements OkuriHkTimeModelInterface
{
    use Haiso\OcodeTrait;
    use Haiso\OnameTrait;
    use Haiso\OsubnameTrait;
    use Denpyo\DenkuNumTrait;
    use Haiso\HcodeTrait;
    use Haiso\HnameTrait;
    use Good\JyouonTrait;
    use Good\ReizouTrait;
    use Good\ReitouTrait;
    use Haiso\HkCodeTrait;
    use Haiso\HkNameTrait;
}
