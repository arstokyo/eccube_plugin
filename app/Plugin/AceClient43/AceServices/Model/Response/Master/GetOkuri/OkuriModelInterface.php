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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for OkuriModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface OkuriModelInterface extends Haiso\HasOcodeInterface, Haiso\HasOnameInterface, Haiso\HasHcodeInterface, Haiso\HasHnameInterface, Good\HasJyouonInterface, Good\HasReizouInterface, Good\HasReitouInterface, NoCategory\HasKubunInterface
{
    /**
     * Get 代引区分
     */
    public function getKubun(): ?int;

    /**
     * Set 代引区分
     */
    public function setKubun(?int $kubun);
}
