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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Address\HasFourAdrInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Address\HasFourCdvAdrInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasKanaInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel3ExtractInterface;

/**
 * Interface GetHaisoAdrsModelResponseInterface
 *
 * @author kmorino
 */
interface GetHaisouAdrsModelInterface extends PersonLevel3ExtractInterface, HasFourCdvAdrInterface, HasKanaInterface, HasFourAdrInterface, HasThreeAdrBikouInterface
{
    /**
     * Set 氏名
     *
     * @param ?string $cnvname
     */
    public function setCnvName(?string $cnvname);

    /**
     * Get 氏名
     *
     * @param ?string $cnvname
     */
    public function getCnvName(): ?string;
}
