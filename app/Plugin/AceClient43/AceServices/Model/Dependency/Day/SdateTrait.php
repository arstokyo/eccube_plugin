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
 * Trait for 記録日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SdateTrait
{
    /** @var ?AceDateTime\AceDateTime 記録日 */
    protected ?AceDateTime\AceDateTime $sdate = null;

    /**
     * {@inheritDoc}
     */
    public function getSdate()
    {
        return $this->sdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setSdate($sdate)
    {
        $this->sdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($sdate);

        return $this;
    }
}
