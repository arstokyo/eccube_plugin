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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberFreeModelInterface extends NoCategory\HasMbidInterface, NoCategory\HasKubunInterface
{
    /**
     * Get フリー内容
     *
     * @return ?string
     */
    public function getFree(): ?string;

    /**
     * Set フリー内容
     *
     * @param ?string $free
     *
     * @return $this
     */
    public function setFree(?string $free);
}
