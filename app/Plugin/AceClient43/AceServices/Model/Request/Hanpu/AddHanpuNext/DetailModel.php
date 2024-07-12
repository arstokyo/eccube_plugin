<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\DetailModel as ParentModel;

/**
 * Class DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class DetailModel extends ParentModel
{
    /**
    * @param Request\Hanpu\AddHanpuNext\HanmeiModel[]|null $hanmei
    */
    function setHanmei(?array $hanmei): self
    {
        return parent::setHanmei($hanmei);
    }
}