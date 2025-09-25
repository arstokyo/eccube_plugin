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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var TotalModel total
     */
    private ?TotalModel $total = null;

    /**
     * {@inheritDoc}
     */
    public function getTotal(): ?TotalModel
    {
        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal(?TotalModel $total): void
    {
        $this->total = $total;
    }
}
