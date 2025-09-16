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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\DetailModel as ParentModel;

/**
 * Class DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DetailModel extends ParentModel
{
    /**
     * @param HanmeiModel[]|null $hanmei
     */
    public function setHanmei(?array $hanmei): self
    {
        return parent::setHanmei($hanmei);
    }
}
