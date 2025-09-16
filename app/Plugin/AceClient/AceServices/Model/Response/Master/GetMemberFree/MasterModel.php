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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * MemberFree
     *
     * @var MemberFreeModel[]|null
     */
    protected ?array $memberFree = null;

    /**
     * {@inheritDoc}
     */
    public function getMemberFree(): ?array
    {
        return $this->memberFree;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemberFree(?array $memberFree): void
    {
        $this->memberFree = $memberFree;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'MemberFree' => MemberFreeModel::class,
        ];
    }
}
