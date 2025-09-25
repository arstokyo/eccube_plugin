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
 * Trait for 売上日
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UdayTrait
{
    /** @var ?AceDateTime\AceDateTime 売上日 */
    protected ?AceDateTime\AceDateTime $uday = null;

    /**
     * {@inheritDoc}
     */
    public function getUday()
    {
        return $this->uday;
    }

    /**
     * {@inheritDoc}
     */
    public function setUday($uday)
    {
        $this->uday = AceDateTime\AceDateTimeFactory::makeAceDateTime($uday);

        return $this;
    }
}
