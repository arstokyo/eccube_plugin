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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Login Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Rireki
     *
     * @return RirekiModel[]|null
     */
    public function getRireki(): ?array;

    /**
     * Set Rireki
     *
     * @param RirekiModel[]|null $rireki
     *
     * @return void
     */
    public function setRireki(?array $rireki): void;
}
