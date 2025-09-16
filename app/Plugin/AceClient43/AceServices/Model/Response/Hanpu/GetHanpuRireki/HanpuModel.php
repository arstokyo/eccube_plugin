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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for HanpuModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuModel implements HanpuModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var HandenModel[]|null handen
     */
    private ?array $handen = null;

    /**
     * {@inheritDoc}
     */
    public function getHanden(): ?array
    {
        return $this->handen;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanden(?array $handen): void
    {
        $this->handen = $handen;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Handen' => HandenModel::class,
        ];
    }
}
