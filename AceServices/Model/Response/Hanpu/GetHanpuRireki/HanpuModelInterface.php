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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for HanpuModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanpuModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Handen
     *
     * @return HandenModel[]|null
     */
    public function getHanden(): ?array;

    /**
     * Set Handen
     *
     * @param HandenModel[]|null $handen
     *
     * @return void
     */
    public function setHanden(?array $handen): void;
}
