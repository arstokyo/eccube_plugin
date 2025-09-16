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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Handen\HandenModelGroup1Trait;
    use Handen\HandenModelGroup2Trait;
    use Handen\ThreeDbikouhTrait;
    use Handen\ThreeDfmemohTrait;
    use NoCategory\IdTrait;
    use NoCategory\SessIdTrait;
    use Card\CardModelLevel3Trait;
    use Card\GMO\GMOModelGroup1Trait;
    use Cost\TotalTrait;
    use Day\SdateTrait;

    /** @var ?string SPS会員ID */
    protected ?string $spscustomerid = null;

    /** @var ?string SPSトランザクションID */
    protected ?string $spstid = null;

    /**
     * {@inheritDoc}
     */
    public function getSpscustomerid(): ?string
    {
        return $this->spscustomerid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpscustomerid(?string $spscustomerid)
    {
        $this->spscustomerid = $spscustomerid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpstid(): ?string
    {
        return $this->spstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpstid(?string $spstid)
    {
        $this->spstid = $spstid;

        return $this;
    }
}
