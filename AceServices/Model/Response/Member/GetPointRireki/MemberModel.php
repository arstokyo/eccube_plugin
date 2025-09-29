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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var PointModel[]|null point
     */
    private ?array $point = null;

    /**
     * {@inheritDoc}
     */
    public function getPoint(): ?array
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     */
    public function setPoint(?array $point): void
    {
        $this->point = $point;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['point' => PointModel::class];
    }
}
