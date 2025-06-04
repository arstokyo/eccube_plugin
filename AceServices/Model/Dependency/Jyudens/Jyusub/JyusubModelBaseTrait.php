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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Trait for Jyusub Model Base
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyusubModelBaseTrait
{
    use NoCategory\IdTrait;
    use NoCategory\McodeTrait;
    use Denpyo\ToriKbnTrait;
    use Denpyo\DensyuTrait;
    use Denpyo\ScodeTrait;
    use Denpyo\JcodeTrait;
    use Denpyo\MemIdTrait;
    use Payment\PcodeTrait;
    use Bumon\BumonTrait;
    use Card\CardModelLevel1Trait;
    use Card\TwoBunKatuTrait;
    use Baitai\BcodeTrait;
    use Baitai\BkCodeTrait;
    use Free\ThreeFcodeTrait;
    use Point\PointRituTrait;

    /** @var ?int サンプル区分 */
    protected ?int $smpkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getSmpkbn(): ?int
    {
        return $this->smpkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSmpkbn(?int $smpkbn)
    {
        $this->smpkbn = $smpkbn;

        return $this;
    }
}
