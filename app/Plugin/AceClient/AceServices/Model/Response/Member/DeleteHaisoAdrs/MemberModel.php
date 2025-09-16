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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

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
     * Point
     *
     * @var NmemberModel[]|null
     */
    protected ?array $Nmember = null;

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?array
    {
        return $this->Nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?array $Nmember): void
    {
        $this->Nmember = $Nmember;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Nmember' => NmemberModel::class,
        ];
    }
}
