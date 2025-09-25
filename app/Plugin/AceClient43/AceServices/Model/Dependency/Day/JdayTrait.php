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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Day;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait for 受注日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JdayTrait
{
    /** @var ?AceDateTime\AceDateTime 受注日 */
    protected ?AceDateTime\AceDateTime $jday = null;

    /**
     * {@inheritDoc}
     */
    public function getJday()
    {
        return $this->jday;
    }

    /**
     * {@inheritDoc}
     */
    public function setJday($jday)
    {
        $this->jday = AceDateTime\AceDateTimeFactory::makeAceDateTime($jday);

        return $this;
    }
}
