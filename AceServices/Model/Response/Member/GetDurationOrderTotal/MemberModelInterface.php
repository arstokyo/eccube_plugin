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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Total
     *
     * @return TotalModel[]|null
     */
    public function getTotal(): ?array;

    /**
     * Set Total
     *
     * @param TotalModel[]|null $total
     *
     * @return self
     */
    public function setTotal(?array $total): self;
}
