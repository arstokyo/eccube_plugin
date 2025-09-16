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
 * Trait for 開始日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ExecDateFromTrait
{
    /** @var ?AceDateTime\AceDateTime 開始日時 */
    protected ?AceDateTime\AceDateTime $execDateFrom = null;

    /**
     * {@inheritDoc}
     */
    public function getExecDateFrom()
    {
        return $this->execDateFrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setExecDateFrom($execDateFrom)
    {
        $this->execDateFrom = AceDateTime\AceDateTimeFactory::makeAceDateTime($execDateFrom, 'Y/m/d H:i:s');

        return $this;
    }
}
