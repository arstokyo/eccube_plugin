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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnk;

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
     * MemAnk
     *
     * @var MemAnkModel[]|null
     */
    protected ?array $memAnk = null;

    /**
     * {@inheritDoc}
     */
    public function getMemAnk(): ?array
    {
        return $this->memAnk;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemAnk(?array $memAnk): void
    {
        $this->memAnk = $memAnk;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'MemAnk' => MemAnkModel::class,
        ];
    }
}
