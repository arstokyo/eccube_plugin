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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MemberModel
 *
 * @author kmorino
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * GetHaisouAdrs
     *
     * @var GetHaisouAdrsModel[]|null
     */
    private ?array $getHaisouAdrs = null;

    /**
     * {@inheritDoc}
     */
    public function getGetHaisouAdrs(): ?array
    {
        return $this->getHaisouAdrs;
    }

    /**
     * {@inheritDoc}
     */
    public function setGetHaisouAdrs(?array $haisouAdrs): void
    {
        $this->getHaisouAdrs = $haisouAdrs;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['getHaisouAdrs' => GetHaisouAdrsModel::class];
    }
}
