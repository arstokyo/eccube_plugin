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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface MemberModelInterface
 *
 * @author kmorinos
 */
interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get GetHaisouAdrs
     *
     * @return GetHaisouAdrsModel[]|null
     */
    public function getGetHaisouAdrs(): ?array;

    /**
     * Set GetHaisouAdrs
     *
     * @param GetHaisouAdrsModel[]|null $getHaisouAdrs
     *
     * @return void
     */
    public function setGetHaisouAdrs(?array $getHaisouAdrs): void;
}
