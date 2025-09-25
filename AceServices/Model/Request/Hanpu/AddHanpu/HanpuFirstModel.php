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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Class HanpuFirstModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuFirstModel implements HanpuFirstModelInterface
{
    use Day\SdayTrait;

    /** @var ?AceDateTime\AceDateTime 初回お届け日 */
    protected ?AceDateTime\AceDateTime $otodokeday = null;

    /**
     * {@inheritDoc}
     */
    public function getOtodokeday()
    {
        return $this->otodokeday;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtodokeday($otodokeday)
    {
        $this->otodokeday = AceDateTime\AceDateTimeFactory::makeAceDateTime($otodokeday);

        return $this;
    }
}
