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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;

/**
 * Trait HandenModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HandenModelBaseTrait
{
    use Day\DayTrait;
    use Denpyo\TcodeTrait;
    use Denpyo\JcodeTrait;
    use Payment\PcodeTrait;
    use Baitai\BcodeTrait;
    use Baitai\BkCodeTrait;
    use Bumon\BumonTrait;
    use Souko\SoukoTrait;
    use Haiso\HcodeTrait;
    use Haiso\HtimeTrait;
    use Free\ThreeFcodeTrait;
    use Bikou\TwoNBikouTrait;
    use Bikou\TwoOBikouTrait;

    /** @var ?string 頒布伝票備考1 */
    protected ?string $hbikou1 = null;

    /** @var ?string 頒布伝票備考2 */
    protected ?string $hbikou2 = null;

    /**
     * {@inheritDoc}
     */
    public function getHbikou1(): ?string
    {
        return $this->hbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setHbikou1(?string $hbikou1)
    {
        $this->hbikou1 = $hbikou1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHbikou2(): ?string
    {
        return $this->hbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setHbikou2(?string $hbikou2)
    {
        $this->hbikou2 = $hbikou2;

        return $this;
    }
}
