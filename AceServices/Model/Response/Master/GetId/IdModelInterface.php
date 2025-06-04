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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetId;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for IdModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface IdModelInterface extends NoCategory\HasIdInterface
{
    /**
     * Get ID名
     *
     * @return ?string
     */
    public function getIdName(): ?string;

    /**
     * Set ID名
     *
     * @param ?string $idName
     *
     * @return $this
     */
    public function setIdName(?string $idName);
}
