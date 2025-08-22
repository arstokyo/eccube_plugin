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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

use Symfony\Component\Serializer\Attribute\Ignore;

/**
 * Trait for ポイント
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointTrait
{
    /** @var int|string|null ポイント */
    protected ?int $point = 0;

    /**
     * {@inheritDoc}
     */
    public function getPoint(): ?int
    {
        return max($this->point, 0);
    }

    /***
     * @Ignore()
     * @return int|null
     */
    public function getPurePoint(): ?int
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     */
    public function setPoint(?int $point)
    {
        $this->point = $point;

        return $this;
    }
}
