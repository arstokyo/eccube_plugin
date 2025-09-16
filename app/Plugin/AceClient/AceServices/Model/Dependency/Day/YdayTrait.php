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
 * Trait for 出荷予定日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait YdayTrait
{
    /** @var ?AceDateTime\AceDateTime 出荷予定日 */
    protected ?AceDateTime\AceDateTime $yday = null;

    /**
     * {@inheritDoc}
     */
    public function getYday()
    {
        return $this->yday;
    }

    /**
     * {@inheritDoc}
     */
    public function setYday($yday)
    {
        $this->yday = AceDateTime\AceDateTimeFactory::makeAceDateTime($yday);

        return $this;
    }
}
