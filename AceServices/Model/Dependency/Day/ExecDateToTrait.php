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
 * Trait for 終了日時
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ExecDateToTrait
{
    /** @var ?AceDateTime\AceDateTime 終了日時 */
    protected ?AceDateTime\AceDateTime $execDateTo = null;

    /**
     * {@inheritDoc}
     */
    public function getExecDateTo()
    {
        return $this->execDateTo;
    }

    /**
     * {@inheritDoc}
     */
    public function setExecDateTo($execDateTo)
    {
        $this->execDateTo = AceDateTime\AceDateTimeFactory::makeAceDateTime($execDateTo, 'Y/m/d H:i:s');

        return $this;
    }
}
